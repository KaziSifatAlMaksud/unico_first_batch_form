<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\CardiacRehabilitationAssessment;
use App\Models\PressureSoreForm;
use App\Models\AdlAssessment;
use App\Models\NursingAdmission;
use App\Models\PivcMonitoring;
use App\Models\NanAssessment;
use App\Models\AllergyRecord;
use App\Models\EndOfLifeCareForm;
use App\Models\PalliativeCareNote;
use App\Models\CarePlan;
use App\Models\AdmissionMedication;
use App\Models\AdmissionNoteIcu;


class FormController extends Controller
{



    public function store5(Request $request)
    {
        $request->validate([
            'patient_name' => 'nullable|string',
            'uhid' => 'nullable|string',
        ]);

        $data = $request->all();

        // Convert checkbox arrays to comma string if needed
        $arrayFields = [
            'location',
            'site',
            'indication'
        ];

        foreach ($arrayFields as $field) {
            if ($request->has($field)) {
                $data[$field] = is_array($request->$field)
                    ? implode(',', $request->$field)
                    : $request->$field;
            }
        }

        $assessment = PivcMonitoring::create($data);

        return view('Form.form5.form_5_pdf', [
            'latestEntry' => $assessment
        ]);
    }



    public function store6(Request $request)
    {
        $request->validate([
            'patient_name' => 'required|string|max:255',
            'uhid' => 'required|string|max:100',
        ]);

        $data = $request->all();

        // Handle multiple checkbox fields safely
        $data['gender'] = $request->input('gender'); 
        $data['loc'] = $request->input('loc');
        $data['wt_change'] = $request->input('wt_change');
        $data['wt_intentional'] = $request->input('wt_intentional');
        $data['obesity_grade'] = $request->input('obesity_grade');
        $data['ced_grade'] = $request->input('ced_grade');
        $data['nutr_diag'] = $request->input('nutr_diag');
        $data['gi_overall'] = $request->input('gi_overall');
        $data['appetite'] = $request->input('appetite');
        $data['nausea'] = $request->input('nausea');
        $data['vomiting'] = $request->input('vomiting');
        $data['diarrhoea'] = $request->input('diarrhoea');
        $data['food_allergy'] = $request->input('food_allergy');
        $data['feeding_mode'] = $request->input('feeding_mode');
        $data['chewing'] = $request->input('chewing');
        $data['activity'] = $request->input('activity');
        $data['hepatic_specify'] = $request->input('hepatic_specify');

        // Convert arrays to JSON (VERY IMPORTANT)
        $data['gender'] = json_encode($data['gender']);
        $data['loc'] = json_encode($data['loc']);
        $data['wt_change'] = json_encode($data['wt_change']);
        $data['wt_intentional'] = json_encode($data['wt_intentional']);
        $data['obesity_grade'] = json_encode($data['obesity_grade']);
        $data['ced_grade'] = json_encode($data['ced_grade']);
        $data['nutr_diag'] = json_encode($data['nutr_diag']);
        $data['gi_overall'] = json_encode($data['gi_overall']);
        $data['appetite'] = json_encode($data['appetite']);
        $data['nausea'] = json_encode($data['nausea']);
        $data['vomiting'] = json_encode($data['vomiting']);
        $data['diarrhoea'] = json_encode($data['diarrhoea']);
        $data['food_allergy'] = json_encode($data['food_allergy']);
        $data['feeding_mode'] = json_encode($data['feeding_mode']);
        $data['chewing'] = json_encode($data['chewing']);
        $data['activity'] = json_encode($data['activity']);

        // Save to database
        $assessment = NanAssessment::create($data);

        return view('Form.form6.form_6_pdf', [
            'latestEntry' => $assessment
        ]);
    }



    public function store7(Request $request)
    {
        // Validation
        $validated = $request->validate([
            'patient_name' => 'nullable|string|max:150',
            'uhid' => 'nullable|string|max:100',
            'gender' => 'nullable|string',
            'age' => 'nullable|integer',
        ]);

        // Create new record
        $record = new AllergyRecord();

        $record->patient_name = $request->patient_name;
        $record->uhid = $request->uhid;
        $record->gender = $request->gender;
        $record->age = $request->age;

        $record->weight = $request->weight;
        $record->height = $request->height;

        $record->location = $request->location;
        $record->assess_date = $request->assess_date;
        $record->assess_time = $request->assess_time;

        $record->known_allergy = $request->known_allergy;

        // Convert checkbox arrays to JSON
        $record->allergy_type = json_encode($request->allergy_type);
        $record->ai_reaction = json_encode($request->ai_reaction);
        $record->ai_source = json_encode($request->ai_source);

        $record->food_reaction_type = json_encode($request->food_reaction_type);
        $record->drug_reaction_type = json_encode($request->drug_reaction_type);

        // Other fields
        $record->ai_reaction_desc = $request->ai_reaction_desc;
        $record->ai_date_noted = $request->ai_date_noted;
        $record->ai_documented = $request->ai_documented;

        $record->drug_name = $request->drug_name;
        $record->drug_reaction_date = $request->drug_reaction_date;
        $record->drug_reaction_obs = $request->drug_reaction_obs;
        $record->drug_severity = $request->drug_severity;
        $record->drug_precautions = $request->drug_precautions;
        $record->drug_notes_yn = $request->drug_notes_yn;
        $record->drug_notes = $request->drug_notes;

        $record->food_allergen = $request->food_allergen;
        $record->food_reaction_date = $request->food_reaction_date;
        $record->food_reaction_obs = $request->food_reaction_obs;
        $record->food_severity = $request->food_severity;
        $record->food_precautions = $request->food_precautions;
        $record->food_notes_yn = $request->food_notes_yn;
        $record->food_notes = $request->food_notes;

        $record->bracelet = $request->bracelet;
        $record->emr_alert = $request->emr_alert;
        $record->special_diet = $request->special_diet;
        $record->pre_med = $request->pre_med;
        $record->staff_informed = $request->staff_informed;

        $record->other_precautions = $request->other_precautions;
        $record->other_precautions_txt = $request->other_precautions_txt;
        $record->int_notes = $request->int_notes;

        $record->physician_name = $request->physician_name;
        $record->physician_sig = $request->physician_sig;
        $record->physician_datetime = $request->physician_datetime;

        $record->nurse_name = $request->nurse_name;
        $record->nurse_sig = $request->nurse_sig;
        $record->nurse_datetime = $request->nurse_datetime;

        $record->verified_by = $request->verified_by;
        $record->verified_sig = $request->verified_sig;
        $record->verified_datetime = $request->verified_datetime;

        // Save record
        $record->save();

        // Return PDF view with saved data
        return view('Form.form7.form_7_pdf', [
            'latestEntry' => $record
        ]);
    }


    public function store3(Request $request)
    {

         $assessment = AdlAssessment::create([

            // Patient Info
            'patient_name' => $request->patient_name,
            'uhid' => $request->uhid,
            'age' => $request->age,

            'gender' => is_array($request->gender)
                ? implode(',', $request->gender)
                : $request->gender,

            'assessment_date' => $request->assessment_date,
            'assessment_time' => $request->assessment_time,

            'height_cm' => $request->height_cm,
            'weight_kg' => $request->weight_kg,
            'bmi' => $request->bmi,

            'location' => is_array($request->location)
                ? implode(',', $request->location)
                : $request->location,

            'consultant' => $request->consultant,

            // BADL
            'badl_0_loa' => $request->badl_0_loa,
            'badl_0_rem' => $request->badl_0_rem,

            'badl_1_loa' => $request->badl_1_loa,
            'badl_1_rem' => $request->badl_1_rem,

            'badl_2_loa' => $request->badl_2_loa,
            'badl_2_rem' => $request->badl_2_rem,

            'badl_3_loa' => $request->badl_3_loa,
            'badl_3_rem' => $request->badl_3_rem,

            'badl_4_loa' => $request->badl_4_loa,
            'badl_4_rem' => $request->badl_4_rem,

            'badl_5_loa' => $request->badl_5_loa,
            'badl_5_rem' => $request->badl_5_rem,

            'badl_6_loa' => $request->badl_6_loa,
            'badl_6_rem' => $request->badl_6_rem,

            // Mobility
            'mob_0_loa' => $request->mob_0_loa,
            'mob_0_rem' => $request->mob_0_rem,

            'mob_1_loa' => $request->mob_1_loa,
            'mob_1_rem' => $request->mob_1_rem,

            'mob_2_loa' => $request->mob_2_loa,
            'mob_2_rem' => $request->mob_2_rem,

            'mob_3_loa' => $request->mob_3_loa,
            'mob_3_rem' => $request->mob_3_rem,

            'mob_4_loa' => $request->mob_4_loa,
            'mob_4_rem' => $request->mob_4_rem,

            // IADL
            'iadl_0_loa' => $request->iadl_0_loa,
            'iadl_0_rem' => $request->iadl_0_rem,

            'iadl_1_loa' => $request->iadl_1_loa,
            'iadl_1_rem' => $request->iadl_1_rem,

            'iadl_2_loa' => $request->iadl_2_loa,
            'iadl_2_rem' => $request->iadl_2_rem,

            'iadl_3_loa' => $request->iadl_3_loa,
            'iadl_3_rem' => $request->iadl_3_rem,

            'iadl_4_loa' => $request->iadl_4_loa,
            'iadl_4_rem' => $request->iadl_4_rem,

            'iadl_5_loa' => $request->iadl_5_loa,
            'iadl_5_rem' => $request->iadl_5_rem,

            'iadl_6_loa' => $request->iadl_6_loa,
            'iadl_6_rem' => $request->iadl_6_rem,

            // Functional Tolerance
            'ft_symptom' => is_array($request->ft_symptom)
                ? implode(',', $request->ft_symptom)
                : $request->ft_symptom,

            'ft_others' => $request->ft_others,

            'borg_rpe' => $request->borg_rpe,

            'rest_breaks' => is_array($request->rest_breaks)
                ? implode(',', $request->rest_breaks)
                : $request->rest_breaks,

            'assistive' => is_array($request->assistive)
                ? implode(',', $request->assistive)
                : $request->assistive,

            'assistive_others' => $request->assistive_others,

            'falls_6m' => is_array($request->falls_6m)
                ? implode(',', $request->falls_6m)
                : $request->falls_6m,

            'fear_fall' => is_array($request->fear_fall)
                ? implode(',', $request->fear_fall)
                : $request->fear_fall,

            'env_barriers' => is_array($request->env_barriers)
                ? implode(',', $request->env_barriers)
                : $request->env_barriers,

            'sleep_dist' => is_array($request->sleep_dist)
                ? implode(',', $request->sleep_dist)
                : $request->sleep_dist,

            'sleep_remarks' => $request->sleep_remarks,

            // Overall Status
            'adl_status' => is_array($request->adl_status)
                ? implode(',', $request->adl_status)
                : $request->adl_status,

            'adl_prog' => is_array($request->adl_prog)
                ? implode(',', $request->adl_prog)
                : $request->adl_prog,

            'adl_prog_remarks' => $request->adl_prog_remarks,

            'recommendation' => is_array($request->recommendation)
                ? implode(',', $request->recommendation)
                : $request->recommendation,

            'education' => is_array($request->education)
                ? implode(',', $request->education)
                : $request->education,

            'education_date' => $request->education_date,

            // Signature
            'physio_name' => $request->physio_name,
            'physio_datetime' => $request->physio_datetime,
            'verified_name' => $request->verified_name,
            'emp_id' => $request->emp_id,
        ]);

       
        return view('Form.form3.form_3_pdf', [
            'latestEntry' => $assessment
        ]);
    }



    public function store8(Request $request)
    {
        $data = $request->all();

        $arrayFields = [
            'location',
            'source',
            'reason',
            'status',
            'vent_mode',
            'risk',
            'care_order',
            'gender',
        ];

        foreach ($arrayFields as $field) {
            $data[$field] = $request->has($field)
                ? json_encode($request->$field)
                : null;
        }

        /*
        |--------------------------------------------------------------------------
        | Boolean fields (Yes/No or checked = 1)
        |--------------------------------------------------------------------------
        */
        $booleanFields = [
            'spont_breathing',
            'intubated',
            'tracheostomy',
            'tv',
            'allergy_yn',
        ];

        foreach ($booleanFields as $field) {
            $data[$field] = $request->has($field) ? 1 : 0;
        }

        /*
        |--------------------------------------------------------------------------
        | Save Admission
        |--------------------------------------------------------------------------
        */
        $admission = AdmissionNoteIcu::create($data);

        /*
        |--------------------------------------------------------------------------
        | MEDICATIONS (Dynamic rows)
        |--------------------------------------------------------------------------
        */
        foreach ($request->all() as $key => $value) {

            if (preg_match('/med_name_(\d+)/', $key, $matches)) {

                $i = $matches[1];

                // skip empty medication rows
                if (
                    empty($request->input("med_name_$i")) &&
                    empty($request->input("med_dose_$i")) &&
                    empty($request->input("med_route_$i")) &&
                    empty($request->input("med_indication_$i")) &&
                    empty($request->input("med_notes_$i"))
                ) {
                    continue;
                }

                AdmissionMedication::create([
                    'admission_id'   => $admission->id,
                    'med_name'       => $request->input("med_name_$i"),
                    'med_dose'       => $request->input("med_dose_$i"),
                    'med_route'      => $request->input("med_route_$i"),
                    'med_indication' => $request->input("med_indication_$i"),
                    'med_notes'      => $request->input("med_notes_$i"),
                ]);
            }
        }

        /*
        |--------------------------------------------------------------------------
        | Return View (PDF or preview)
        |--------------------------------------------------------------------------
        */
        return view('Form.form8.form_8_pdf', [
            'latestEntry' => AdmissionNoteIcu::with('medications')
                ->latest()
                ->first()
        ]);
    }



     public function store9(Request $request)
    {

        $validated = $request->validate([

            // Patient Info
            'patient_name' => 'nullable|string|max:150',
            'uhid' => 'nullable|string|max:100',
            'gender' => 'nullable|string|max:20',
            'age' => 'nullable|integer',
            'department' => 'nullable|string|max:150',
            'bed_cabin' => 'nullable|string|max:100',
            'consultant' => 'nullable|string|max:150',

            // Consultant Row
            'consultant2' => 'nullable|string|max:150',
            'dept2' => 'nullable|string|max:150',
            'consult_date' => 'nullable|date',

            // Plan
            'plan' => 'nullable|string|max:100',
            'plan_other' => 'nullable|string|max:255',

            // Insight Fields
            'aware_diag_pt' => 'nullable|string|max:50',
            'aware_diag_fam' => 'nullable|string|max:50',

            'recog_dying_pt' => 'nullable|string|max:50',
            'recog_dying_fam' => 'nullable|string|max:50',

            'comm_bed_pt' => 'nullable|string|max:50',
            'comm_bed_fam' => 'nullable|string|max:50',

            'plan_exp_pt' => 'nullable|string|max:50',
            'plan_exp_fam' => 'nullable|string|max:50',

            'understand_pt' => 'nullable|string|max:50',
            'understand_fam' => 'nullable|string|max:50',

            'psych_pt' => 'nullable|string|max:50',
            'psych_fam' => 'nullable|string|max:50',

            'clin_psych' => 'nullable|string|max:10',

            'social_pt' => 'nullable|string|max:50',
            'social_fam' => 'nullable|string|max:50',

            'msw' => 'nullable|string|max:10',

            'relig_pt' => 'nullable|string|max:50',
            'relig_fam' => 'nullable|string|max:50',

            'trad_needs' => 'nullable|string|max:10',
            'trad_needs_specify' => 'nullable|string',

            'special_needs' => 'nullable|string|max:10',
            'special_needs_specify' => 'nullable|string',

            // Doctor Signature
            'doc_name' => 'nullable|string|max:150',
            'doc_empid' => 'nullable|string|max:100',
            'doc_date' => 'nullable|date',
            'doc_time' => 'nullable',

            // Verified By
            'ver_name' => 'nullable|string|max:150',
            'ver_empid' => 'nullable|string|max:100',
            'ver_date' => 'nullable|date',
            'ver_time' => 'nullable',
        ]);


        // Handle Checkbox Values
        $validated['gender'] = $request->gender;
        $validated['plan'] = $request->plan;

        // Store Data
        $form = EndOfLifeCareForm::create($validated);
        return view('Form.form9.form_9_pdf', [
            'latestEntry' => $form
        ]);

    }


   public function store10(Request $request)
    {
        // ✅ 1. Validation
        $request->validate([
            'patient_name' => 'nullable|string|max:255',
            'uhid' => 'nullable|string|max:100',
            'gender' => 'nullable|string|max:10',
            'age' => 'nullable|integer',

            'procedure_name' => 'nullable|string|max:255',
            'diagnosis' => 'nullable|string',
            'consultant' => 'nullable|string|max:255',
            'unit_bed' => 'nullable|string|max:255',

            'date_of_note' => 'nullable|date',
            'time_of_note' => 'nullable',

            'death_date' => 'nullable|date',
            'death_time' => 'nullable',

            'nurse_date' => 'nullable|date',
            'consult_date2' => 'nullable|date',
            'verified_date' => 'nullable|date',
        ]);

        // ✅ 2. ARRAY FIELDS (checkbox / multi-select)
        $arrayFields = [
            'comfort',
            'family',
            'directive'
        ];

        // remove array fields first
        $data = $request->except($arrayFields);

        // convert arrays → comma separated string
        foreach ($arrayFields as $field) {
            $data[$field] = $request->has($field)
                ? implode(',', (array) $request->$field)
                : null;
        }

        // optional single checkbox / normal field
        $data['nursing_notes'] = $request->nursing_notes;

        // Patient status / clinical fields (direct mapping)
        $data['patient_name'] = $request->patient_name;
        $data['uhid'] = $request->uhid;
        $data['gender'] = $request->gender;
        $data['age'] = $request->age;

        $data['procedure_name'] = $request->procedure_name;
        $data['diagnosis'] = $request->diagnosis;
        $data['consultant'] = $request->consultant;
        $data['unit_bed'] = $request->unit_bed;

        $data['date_of_note'] = $request->date_of_note;
        $data['time_of_note'] = $request->time_of_note;

        // Clinical observations
        $data['gcs_obs'] = $request->gcs_obs;
        $data['gcs_rem'] = $request->gcs_rem;

        $data['vitals_obs'] = $request->vitals_obs;
        $data['vitals_rem'] = $request->vitals_rem;

        $data['temp_obs'] = $request->temp_obs;
        $data['temp_rem'] = $request->temp_rem;

        $data['pain_obs'] = $request->pain_obs;
        $data['pain_rem'] = $request->pain_rem;

        $data['resp_obs'] = $request->resp_obs;
        $data['resp_rem'] = $request->resp_rem;

        $data['cardiac_obs'] = $request->cardiac_obs;
        $data['cardiac_rem'] = $request->cardiac_rem;

        $data['fluid_obs'] = $request->fluid_obs;
        $data['fluid_rem'] = $request->fluid_rem;

        $data['skin_obs'] = $request->skin_obs;
        $data['skin_rem'] = $request->skin_rem;

        $data['other_obs'] = $request->other_obs;
        $data['other_rem'] = $request->other_rem;

        // Symptom management
        $data['pain_int'] = $request->pain_int;
        $data['pain_rmk'] = $request->pain_rmk;

        $data['dysp_int'] = $request->dysp_int;
        $data['dysp_rmk'] = $request->dysp_rmk;

        $data['anx_int'] = $request->anx_int;
        $data['anx_rmk'] = $request->anx_rmk;

        $data['nausea_int'] = $request->nausea_int;
        $data['nausea_rmk'] = $request->nausea_rmk;

        $data['sec_int'] = $request->sec_int;
        $data['sec_rmk'] = $request->sec_rmk;

        $data['othersym_int'] = $request->othersym_int;
        $data['othersym_rmk'] = $request->othersym_rmk;

        // Death info
        $data['death_date'] = $request->death_date;
        $data['death_time'] = $request->death_time;
        $data['verifying_physician'] = $request->verifying_physician;
        $data['family_informed'] = $request->family_informed;
        $data['postmortem'] = $request->postmortem;

        // Signatures
        $data['nurse_sig'] = $request->nurse_sig;
        $data['nurse_date'] = $request->nurse_date;
        $data['nurse_time'] = $request->nurse_time;

        $data['consult_sig'] = $request->consult_sig;
        $data['consult_date2'] = $request->consult_date2;
        $data['consult_time2'] = $request->consult_time2;

        $data['verified_sig'] = $request->verified_sig;
        $data['verified_date'] = $request->verified_date;
        $data['verified_time'] = $request->verified_time;

        // ✅ 3. Save
        $assessment = PalliativeCareNote::create($data);

        // ✅ 4. Return PDF
        return view('Form.form10.form_10_pdf', [
            'latestEntry' => $assessment
        ]);
    }

    public function store1(Request $request)
    {
        $arrayFields = [
            'p_diagnosis','heart_rhythm','symptoms_rest','contraindication',
            'comorbidity','activity_level','breathing_pattern','posture',
            'alertness','rom','muscle_power','bed_mobility','sit_stand',
            'sitting_balance','sitting_dyn','standing_balance','standing_dyn',
            'tug_risk','limiting_symptom','motivation_cr','anxiety_depression',
            'social_support','cr_enrollment'
        ];

        $data = $request->except($arrayFields);

        // implode array fields
        foreach ($arrayFields as $field) {
            $data[$field] = $request->has($field)
                ? implode(',', (array) $request->$field)
                : null;
        }

        // checkbox
        $data['mets_estimated'] = $request->has('mets_estimated') ? 'Yes' : 'No';

        // create record
        $assessment = CardiacRehabilitationAssessment::create($data);

        return view('Form.form_1_pdf', [
            'latestEntry' => $assessment
        ]);
    }



    public function store4(Request $request)
    {
        $data = $request->all();

        /*
        |--------------------------------------------------------------------------
        | Convert checkbox arrays to JSON
        |--------------------------------------------------------------------------
        */

        $arrayFields = [
            'how_admitted',
            'location',
            'language',
            'orientation',
            'vuln_assist',
            'vuln',
            'complaint',
            'past_med',
            'past_surg',
            'antiplatelet',
            'anticoag',
            'orient',
        ];

        foreach ($arrayFields as $field) {
            $data[$field] = $request->has($field)
                ? json_encode($request->$field)
                : null;
        }

        /*
        |--------------------------------------------------------------------------
        | Boolean fields
        |--------------------------------------------------------------------------
        */

        $booleanFields = [
            'consent_surgery',
            'consent_anesthesia',
            'consent_blood',

            'any_cultural',
            'any_religious',
            'any_special',

            'dentures',
            'eyewear',
            'hearing',
            'others_aid',

            'cv_no_abn',
            'resp_no_abn',
            'neuro_no_abn',
            'gi_no_abn',
            'psycho_no_abn',
        ];

        foreach ($booleanFields as $field) {
            $data[$field] = $request->has($field) ? 1 : 0;
        }

        /*
        |--------------------------------------------------------------------------
        | Save Data
        |--------------------------------------------------------------------------
        */

         $admission = NursingAdmission::create($data);

             foreach ($request->all() as $key => $value) {

                // Find all care_time_X fields
                if (preg_match('/care_time_(\d+)/', $key, $matches)) {

                    $i = $matches[1];

                    // Skip completely empty rows
                    if (
                        empty($request->input("care_time_$i")) &&
                        empty($request->input("care_diag_$i")) &&
                        empty($request->input("care_goals_$i")) &&
                        empty($request->input("care_interv_$i")) &&
                        empty($request->input("care_eval_$i")) &&
                        empty($request->input("care_sign_$i"))
                    ) {
                        continue;
                    }

                    CarePlan::create([

                        'admission_id' => $admission->id,
                        'care_time'   => $request->input("care_time_$i"),
                        'care_diag'   => $request->input("care_diag_$i"),
                        'care_goals'  => $request->input("care_goals_$i"),
                        'care_interv' => $request->input("care_interv_$i"),
                        'care_eval'   => $request->input("care_eval_$i"),
                        'care_sign'   => $request->input("care_sign_$i"),
                    ]);
                }
            }

        return view('Form.form4.form_4_pdf', [
            'latestEntry' => NursingAdmission::with('carePlans')->latest()->first()
        ]);
    }


   

    public function store22(Request $request)
    {
        $photo1 = null;
        $photo2 = null;
        $photo3 = null;

        // Upload Photo 1
        $photo1 = null;
        if ($request->hasFile('wound_photo_1')) {
            $photo1 = $request->file('wound_photo_1')
                ->store('wound_photos', 'public');
        }

        // Upload Photo 2
        $photo2 = null;
        if ($request->hasFile('wound_photo_2')) {
            $photo2 = $request->file('wound_photo_2')
                ->store('wound_photos', 'public');
        }

        // Upload Photo 3
        $photo3 = null;
        if ($request->hasFile('wound_photo_3')) {
            $photo3 = $request->file('wound_photo_3')
                ->store('wound_photos', 'public');
        }


       $assessment = PressureSoreForm::create([

            // Patient Info
            'patient_name' => $request->patient_name,
            'uhid' => $request->uhid,
            'location' => is_array($request->location)
                ? implode(',', $request->location)
                : $request->location,
            'location_other' => $request->location_other,
            'bed_no' => $request->bed_no,
            'admission_date' => $request->admission_date,
            'primary_diagnosis' => $request->primary_diagnosis,
            'mobility' => is_array($request->mobility)
                ? implode(',', $request->mobility)
                : $request->mobility,

            'nutrition' => is_array($request->nutrition) ? implode(',', $request->nutrition)
                : $request->nutrition,
            'detection_datetime' => $request->detection_datetime,
            'sore_locations' => $request->sore_locations,

            // Size
            'size_l' => $request->size_l,
            'size_w' => $request->size_w,
            'size_d' => $request->size_d,

            // Appearance
            'color' => is_array($request->color)
                ? implode(',', $request->color)
                : $request->color,

            'color_other' => $request->color_other,

            'exudate' => is_array($request->exudate)
                ? implode(',', $request->exudate)
                : $request->exudate,

            'odor' => is_array($request->odor)
                ? implode(',', $request->odor)
                : $request->odor,

            'skin_cond' => is_array($request->skin_cond)
                ? implode(',', $request->skin_cond)
                : $request->skin_cond,

            // Stage
            'stage' => is_array($request->stage)
                ? implode(',', $request->stage)
                : $request->stage,

            // Reporting
            'reported_by' => $request->reported_by,
            'reviewed_by_icn' => $request->reviewed_by_icn,
            'note_cns' => $request->note_cns,

            // Monitoring
            'repo_schedule' => is_array($request->repo_schedule)
                ? implode(',', $request->repo_schedule)
                : $request->repo_schedule,

            'pressure_device' => is_array($request->pressure_device)
                ? implode(',', $request->pressure_device)
                : $request->pressure_device,

            'dressing_type' => is_array($request->dressing_type)
                ? implode(',', $request->dressing_type)
                : $request->dressing_type,

            'topical_meds' => is_array($request->topical_meds)
                ? implode(',', $request->topical_meds)
                : $request->topical_meds,

            'topical_meds_detail' => $request->topical_meds_detail,

            'wc_team' => is_array($request->wc_team)
                ? implode(',', $request->wc_team)
                : $request->wc_team,

            'pain_score' => $request->pain_score,

            'pain_char' => is_array($request->pain_char)
                ? implode(',', $request->pain_char)
                : $request->pain_char,

            // Care
            'freq_assessment' => is_array($request->freq_assessment)
                ? implode(',', $request->freq_assessment)
                : $request->freq_assessment,

            'progress' => is_array($request->progress)
                ? implode(',', $request->progress)
                : $request->progress,

            'next_review_date' => $request->next_review_date,

            'progress_note' => $request->progress_note,
            'remarks' => $request->remarks,

            // Photos
            'wound_photo_1' => $photo1,
            'wound_photo_2' => $photo2,
            'wound_photo_3' => $photo3,

            // Signature
            'signoff_name' => $request->signoff_name,
            'signoff_emp_id' => $request->signoff_emp_id,
            'signoff_datetime' => $request->signoff_datetime,

            'verified_name' => $request->verified_name,
            'verified_emp_id' => $request->verified_emp_id,
            'verified_datetime' => $request->verified_datetime,
        ]);


             

        return view('Form.form2.form_2_pdf', [
            'latestEntry' => $assessment
        ]);

        // return redirect()->back()->with('success', 'Pressure Sore Form Saved Successfully.');
    }

    public function print_view7()
    {
        $latestEntry = AllergyRecord::latest()->first();

        return view('Form.form7.form_7_pdf', [
            'latestEntry' => $latestEntry
        ]);
    }
     public function print_view6()
    {
        $latestEntry = NanAssessment::latest()->first();

        return view('Form.form6.form_6_pdf', [
            'latestEntry' => $latestEntry
        ]);
    }

       public function print_view9()
    {
        $latestEntry = EndOfLifeCareForm::latest()->first();

        return view('Form.form9.form_9_pdf', [
            'latestEntry' => $latestEntry
        ]);
    }

    public function print_view3()
    {
        $latestEntry = AdlAssessment::latest()->first();

        return view('Form.form3.form_3_pdf', [
            'latestEntry' => $latestEntry
        ]);
    }

    public function print_view2()
    {
       
        $latestEntry = PressureSoreForm::latest()->first();
        return view('Form.form2.form_2_pdf', [
            'latestEntry' => $latestEntry
        ]);
    }
    
    public function print_view4()
    {
        $latestEntry = NursingAdmission::with('carePlans')->latest()->first();

        return view('Form.form4.form_4_pdf', [
            'latestEntry' => $latestEntry
        ]);
    }

    
    public function print_view8()
    {
       
        $latestEntry = PressureSoreForm::latest()->first();
        return view('Form.form8.form_8_pdf', [
            'latestEntry' => $latestEntry
        ]);
    }

    public function print_view10()
    {
        $latestEntry = PalliativeCareNote::latest()->first();

        return view('Form.form10.form_10_pdf', [
            'latestEntry' => $latestEntry
        ]);
    }


    public function print_view5()
    {
        $latestEntry = PivcMonitoring::latest()->first();

        return view('Form.form5.form_5_pdf', [
            'latestEntry' => $latestEntry
        ]);
    }
    public function print_view()
    {
        $latestEntry = CardiacRehabilitationAssessment::latest()->first();

        return view('Form.form_1_pdf', [
            'latestEntry' => $latestEntry
        ]);
    }


}