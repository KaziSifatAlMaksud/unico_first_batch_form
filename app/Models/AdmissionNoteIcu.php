<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\AdmissionMedication;

class AdmissionNoteIcu extends Model
{
    use HasFactory;

    protected $table = 'admission_note_icus';

    protected $fillable = [

        // Patient Info
        'patient_name',
        'uhid',
        'gender',
        'age',
        'weight',
        'height',
        'location',
        'consultant',
        'admitting_nurse',
        'adm_date',
        'adm_time',

        // Admission Details
        'source',
        'source_other',
        'reason',
        'reason_other',
        'status',
        'status_other',

        // Presenting History
        'surgery_procedure',
        'surgery_date',
        'surgery_time',
        'intraop_events',
        'clinical_concerns',

        // Vitals
        'hr_val',
        'hr_target',
        'hr_notes',

        'bp_sys',
        'bp_dia',
        'bp_target',
        'bp_notes',

        'map_val',
        'map_target',
        'map_notes',

        'temp_val',
        'temp_target',
        'temp_notes',

        'spo2_val',
        'spo2_target',
        'spo2_notes',

        'rr_val',
        'rr_target',
        'rr_notes',

        'cvp_val',
        'cvp_target',
        'cvp_notes',

        // Airway & Ventilation
        'spont_breathing',
        'intubated',
        'ett_size',
        'tracheostomy',
        'vent_mode',
        'fio2',
        'peep',
        'vent_rate',
        'tv',
        'tv_val',

        // Lines & Drains
        'cl_site',
        'cl_patency',
        'cl_notes',

        'al_site',
        'al_patency',
        'al_notes',

        'ct_site',
        'ct_patency',
        'ct_notes',

        'uc_site',
        'uc_patency',
        'uc_notes',

        'oth_site',
        'oth_patency',
        'oth_notes',

        // Investigations
        'inv_cbc',
        'inv_cbc_p',
        'inv_ecg',
        'inv_ecg_p',
        'inv_img',
        'inv_img_p',
        'inv_spl',
        'inv_spl_p',

        // Medications
        'medications',

        // Care Orders
        'care_order',

        // Risks
        'risk',
        'allergy_yn',
        'allergy_specify',
        'code_status',
        'dnr_specify',

        // Summary
        'admission_summary',

        // Signatures
        'resident_name',
        'resident_sig',
        'resident_dt',

        'consultant_name',
        'consultant_sig',
        'consultant_dt',

        'verified_by',
        'verified_sig',
        'verified_dt',
    ];

    protected $casts = [
        'medications' => 'array',
        'care_order' => 'array',
        'risk' => 'array',
    ];
    public function medications()
    {
        return $this->hasMany(AdmissionMedication::class, 'admission_id');
    }
}