<?php

namespace App\Http\Controllers;

use App\Models\AdmissionRecord;
use App\Models\AdmissionLine;
use App\Models\AdmissionVentilator;
use App\Models\AdmissionVulnerability;
use App\Models\AdmissionDvtWells;
use App\Models\Patient;
use App\Http\Requests\StoreAdmissionRequest;
use App\Http\Requests\UpdateAdmissionRequest;
use Illuminate\Http\Request;
use Illuminate\Http\JsonResponse;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Log;

class AdmissionController extends Controller
{
    // ============================================================
    //  INDEX  —  GET /admissions
    // ============================================================

       public function details()
    {
        // $doctors = Doctor::all()->with('specialization', 'department');
        
        $admissions = AdmissionRecord::all();
        // return view('admissions_details');
        return view('admissions_details', compact('admissions'));
    }

        // ============================================================
    //  SHOW  —  GET /admissions/{id}
    // ============================================================
    public function show(int $id){
        $admission = AdmissionRecord::findOrFail($id);

        return view('addmission_show', compact('admission'));
    }
    

    // ============================================================
    //  STORE  —  POST /admissions
    // ============================================================
 public function store(Request $request)
{
    $validated = $request->validate([

        'admission_date' => 'required|date',
        'initiated_at' => 'nullable',
        'admission_method' => 'nullable|string',
        'bystander_present' => 'nullable',

        'general_condition' => 'nullable|string',
        'respiratory_support' => 'nullable|string',
        'respiratory_support_detail' => 'nullable|string',
        'mother_tongue' => 'nullable|string',
        'can_speak' => 'nullable|string',
        'has_lines_drains' => 'nullable',

        'height_cm' => 'nullable|numeric',
        'weight_kg' => 'nullable|numeric',

        'cultural_needs' => 'nullable',
        'allergies' => 'nullable',
        'pain_present' => 'nullable',

        'gcs_eyes' => 'nullable|numeric',
        'gcs_verbal' => 'nullable|numeric',
        'gcs_motor' => 'nullable|numeric',

        'temp_fahrenheit' => 'nullable|numeric',
        'pulse_per_min' => 'nullable|numeric',
        'resp_rate_per_min' => 'nullable|numeric',
        'bp_systolic' => 'nullable|numeric',
        'bp_diastolic' => 'nullable|numeric',
        'spo2_percent' => 'nullable|numeric',

        'ventilation_type' => 'nullable|string',

        'oriented_side_rails' => 'nullable',
        'oriented_privacy' => 'nullable',
        'oriented_visitor_policy' => 'nullable',

        'dentures' => 'nullable|string',
        'eyewear' => 'nullable|string',
        'hearing_aid' => 'nullable|string',

    ]);

    DB::beginTransaction();

    try {

        // DVT Calculation Example
        $dvtScore = 0;

        if ($request->has('dvt_score')) {
            $dvtScore = $request->dvt_score;
        }

        if ($dvtScore >= 3) {
            $dvtRiskLevel = 'High';
        } elseif ($dvtScore >= 1) {
            $dvtRiskLevel = 'Moderate';
        } else {
            $dvtRiskLevel = 'Low';
        }

        $admission = AdmissionRecord::create([

            'admission_date' => $validated['admission_date'],
            'initiated_at' => $validated['initiated_at'] ?? null,
            'admission_method' => $validated['admission_method'] ?? null,

            'bystander_present' => $request->has('bystander_present'),

            'general_condition' => $validated['general_condition'] ?? null,
            'respiratory_support' => $validated['respiratory_support'] ?? null,
            'respiratory_support_detail' => $validated['respiratory_support_detail'] ?? null,

            'mother_tongue' => $validated['mother_tongue'] ?? null,
            'can_speak' => $validated['can_speak'] ?? null,

            'has_lines_drains' => $request->has('has_lines_drains'),

            'height_cm' => $validated['height_cm'] ?? null,
            'weight_kg' => $validated['weight_kg'] ?? null,

            'cultural_needs' => $request->has('cultural_needs'),
            'allergies' => $request->has('allergies'),
            'pain_present' => $request->has('pain_present'),

            'gcs_eyes' => $validated['gcs_eyes'] ?? null,
            'gcs_verbal' => $validated['gcs_verbal'] ?? null,
            'gcs_motor' => $validated['gcs_motor'] ?? null,

            'temp_fahrenheit' => $validated['temp_fahrenheit'] ?? null,
            'pulse_per_min' => $validated['pulse_per_min'] ?? null,
            'resp_rate_per_min' => $validated['resp_rate_per_min'] ?? null,

            'bp_systolic' => $validated['bp_systolic'] ?? null,
            'bp_diastolic' => $validated['bp_diastolic'] ?? null,

            'spo2_percent' => $validated['spo2_percent'] ?? null,

            'ventilation_type' => $validated['ventilation_type'] ?? null,

            // FIXED COLUMN NAMES
            'oriented_side_rails' => $request->has('oriented_side_rails'),
            'oriented_privacy' => $request->has('oriented_privacy'),
            'oriented_visitor_policy' => $request->has('oriented_visitor_policy'),

            'dentures' => $validated['dentures'] ?? 'No',
            'eyewear' => $validated['eyewear'] ?? 'No',
            'hearing_aid' => $validated['hearing_aid'] ?? 'No',

            'dvt_wells_total' => $dvtScore,
            'dvt_risk_level' => $dvtRiskLevel,

            'created_by' => Auth::id() ?? '0120',
        ]);

        DB::commit();
        return redirect()
        ->route('admissions_details')
        ->with('success', 'Admission record created successfully.');

    } catch (\Throwable $e) {

        DB::rollBack();

        Log::error('AdmissionController@store failed', [
            'error' => $e->getMessage(),
            'line' => $e->getLine(),
            'user_id' => Auth::id(),
        ]);

        return response()->json([
            'status' => 'error',
            'message' => 'Failed to save admission record.',
            'detail' => config('app.debug') ? $e->getMessage() : null,
        ], 500);
    }
}



    // ============================================================
    //  UPDATE  —  PUT/PATCH /admissions/{id}
    // ============================================================
    public function update(UpdateAdmissionRequest $request, int $id): JsonResponse
    {
        DB::beginTransaction();

        try {
            $admission = AdmissionRecord::findOrFail($id);
            $validated = $request->validated();

            // ── Recompute DVT if provided ────────────────────
            if (isset($validated['dvt'])) {
                $dvtScore                   = $this->computeDvtScore($validated['dvt']);
                $validated['dvt_wells_total'] = $dvtScore;
                $validated['dvt_risk_level']  = $this->getDvtRiskLevel($dvtScore);
            }

            // ── Update main record ───────────────────────────
            $admission->update(collect($validated)
                ->except(['lines', 'ventilator', 'vulnerability', 'dvt'])
                ->toArray());

            // ── Update lines ─────────────────────────────────
            if (array_key_exists('lines', $validated)) {
                $admission->lines()->delete();
                if (!empty($validated['lines'])) {
                    $lineInserts = array_map(
                        fn($type) => ['admission_id' => $admission->id, 'line_type' => $type],
                        $validated['lines']
                    );
                    AdmissionLine::insert($lineInserts);
                }
            }

            // ── Update ventilator ────────────────────────────
            if (isset($validated['ventilator'])) {
                $admission->ventilator()->updateOrCreate(
                    ['admission_id' => $admission->id],
                    $validated['ventilator']
                );
            }

            // ── Update vulnerability ─────────────────────────
            if (isset($validated['vulnerability'])) {
                $admission->vulnerability()->updateOrCreate(
                    ['admission_id' => $admission->id],
                    $validated['vulnerability']
                );
            }

            // ── Update DVT ───────────────────────────────────
            if (isset($validated['dvt'])) {
                $dvtRecord = $admission->dvtWells()->updateOrCreate(
                    ['admission_id' => $admission->id],
                    array_merge($validated['dvt'], ['wells_score' => $validated['dvt_wells_total']])
                );
            }

            DB::commit();

            return response()->json([
                'status'  => 'success',
                'message' => 'Admission record updated successfully.',
                'data'    => $admission->fresh([
                    'patient', 'lines', 'ventilator',
                    'vulnerability', 'dvtWells',
                ]),
            ]);

        } catch (\Throwable $e) {
            DB::rollBack();
            Log::error('AdmissionController@update failed', [
                'id'      => $id,
                'error'   => $e->getMessage(),
                'user_id' => Auth::id(),
            ]);

            return response()->json([
                'status'  => 'error',
                'message' => 'Failed to update admission record.',
                'detail'  => config('app.debug') ? $e->getMessage() : null,
            ], 500);
        }
    }

    // ============================================================
    //  DESTROY  —  DELETE /admissions/{id}
    // ============================================================
    public function destroy(int $id): JsonResponse
    {
        $admission = AdmissionRecord::findOrFail($id);
        $admission->delete(); // soft delete

        return response()->json([
            'status'  => 'success',
            'message' => 'Admission record deleted.',
        ]);
    }

    // ============================================================
    //  RESTORE  —  POST /admissions/{id}/restore
    // ============================================================
    public function restore(int $id): JsonResponse
    {
        $admission = AdmissionRecord::withTrashed()->findOrFail($id);
        $admission->restore();

        return response()->json([
            'status'  => 'success',
            'message' => 'Admission record restored.',
            'data'    => $admission,
        ]);
    }

    // ============================================================
    //  SUMMARY STATS  —  GET /admissions/stats
    // ============================================================
    public function stats(Request $request): JsonResponse
    {
        $date = $request->input('date', today()->toDateString());

        $stats = AdmissionRecord::whereDate('admission_date', $date)
            ->selectRaw("
                COUNT(*)                                    AS total_admissions,
                ROUND(AVG(gcs_eyes + gcs_verbal + gcs_motor), 1) AS avg_gcs,
                ROUND(AVG(spo2_percent), 1)                 AS avg_spo2,
                ROUND(AVG(pulse_per_min), 1)                AS avg_pulse,
                SUM(bystander_present)                      AS with_bystander,
                SUM(CASE WHEN dvt_risk_level = 'High'     THEN 1 ELSE 0 END) AS high_dvt_count,
                SUM(CASE WHEN (gcs_eyes+gcs_verbal+gcs_motor) <= 8 THEN 1 ELSE 0 END) AS severe_gcs_count
            ")
            ->first();

        return response()->json([
            'status' => 'success',
            'date'   => $date,
            'data'   => $stats,
        ]);
    }

    // ============================================================
    //  PRIVATE HELPERS
    // ============================================================
    private function computeDvtScore(array $data): int
    {
        $weights = [
            'active_cancer'         =>  1,
            'paralysis_immobilized' =>  1,
            'bedridden_or_surgery'  =>  1,
            'localized_tenderness'  =>  1,
            'entire_leg_swollen'    =>  1,
            'calf_swelling_3cm'     =>  1,
            'pitting_oedema'        =>  1,
            'collateral_veins'      =>  1,
            'alternative_diagnosis' => -2,
        ];

        $score = 0;
        foreach ($weights as $field => $weight) {
            if (!empty($data[$field])) {
                $score += $weight;
            }
        }
        return $score;
    }

    private function getDvtRiskLevel(int $score): string
    {
        return match (true) {
            $score >= 3 => 'High',
            $score >= 1 => 'Moderate',
            default     => 'Low',
        };
    }
}
