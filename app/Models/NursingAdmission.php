<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

use App\Models\CarePlan;

class NursingAdmission extends Model
{
    use HasFactory;

    protected $table = 'nursing_admissions';

    protected $fillable = [

        // Patient Info
        'patient_name',
        'uhid',
        'doa',
        'adm_date',
        'adm_time',
        'how_admitted',
        'bystander',
        'location',
        'location_other',
        'primary_surgeon',

        // Initial Assessment
        'id_band',
        'consent_surgery',
        'consent_anesthesia',
        'consent_blood',
        'consent_yn',
        'assessment_time',
        'admitted2',
        'bystander2',
        'gen_condition',
        'gen_condition_other',

        // Vitals
        'pulse',
        'bp_sys',
        'bp_dia',
        'temp',
        'resp',
        'spo2',

        // Language / BMI
        'language',
        'language_other',
        'height',
        'weight',
        'bmi',

        // Allergy
        'allergies',
        'allergies_specify',
        'any_cultural',
        'any_religious',
        'any_special',
        'special_needs',

        // Personal Aids
        'dentures',
        'dentures_yn',
        'eyewear',
        'eyewear_yn',
        'hearing',
        'hearing_yn',
        'others_aid',
        'others_aid_txt',

        // Diagnosis
        'diagnosis',
        'planned_procedure',

        // Orientation
        'orientation',

        // Vulnerability
        'vuln_assist',
        'vuln_assist_other',
        'vuln',

        // History
        'complaint',
        'complaint_other',
        'past_med',
        'past_surg',
        'past_surg_other',

        // Medication
        'antiplatelet',
        'anticoag',
        'beta_blockers',
        'ace_arb',
        'diuretics',
        'last_dose',
        'drug_allergy_yn',
        'herbal_yn',
        'herbal_specify',

        // Systematic Evaluation
        'heart_rhythm',
        'murmur',
        'cv_no_abn',

        'smoking_hx',
        'breath_sounds',
        'resp_no_abn',

        'orient',
        'consciousness',
        'neuro_no_abn',

        'last_voided',
        'bowel_habits',
        'gi_no_abn',

        'pt_understanding',
        'anxiety_level',
        'psycho_no_abn',

        // Skin
        'skin_intact',
        'skin_specify',
        'bed_sore',
        'bed_sore_specify',

        // Documentation
        'baseline_doc',
        'baseline_specify',
        'abnormal_esc',
        'abnormal_specify',
        'nursing_summary',

        // Nurse
        'nurse_name',
        'nurse_datetime',
        'verified_by',
        'emp_id',
    ];

    protected $casts = [

        // Arrays
        'how_admitted' => 'array',
        'location' => 'array',
        'orientation' => 'array',
        'vuln_assist' => 'array',
        'vuln' => 'array',
        'complaint' => 'array',
        'past_med' => 'array',
        'past_surg' => 'array',
        'antiplatelet' => 'array',
        'anticoag' => 'array',
        'language' => 'array',
    ];

    public function carePlans()
    {
        return $this->hasMany(CarePlan::class, 'admission_id');
    }
}