<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class NanAssessment extends Model
{
    use HasFactory;

    protected $table = 'nan_assessments';

    protected $fillable = [

        'patient_name',
        'uhid',

        'age',
        'gender',
        'diagnosis_hdr',
        'loc',

        'weight',
        'height',
        'bmi',

        'wt_change',
        'wt_amount',
        'wt_months',
        'wt_intentional',

        'obesity_grade',
        'ced_grade',

        'primary_diag',

        'nutr_diag',
        'cardiac_specify',
        'renal_specify',
        'nutr_diag_other',

        'gi_overall',
        'appetite',
        'appetite_remarks',

        'nausea',
        'nausea_remarks',

        'vomiting',
        'vomiting_remarks',

        'diarrhoea',
        'diarrhoea_remarks',

        'food_allergy',
        'food_allergy_remarks',

        'food_preference',

        'feeding_mode',
        'chewing',
        'chewing_remarks',

        'activity',

        'clinician_recommendation',
        'clinician_signature',

        'dietitian_plan',
        'dietitian_signature',

        'nurse_name',
        'nurse_datetime',
        'verified_by',
        'emp_id',
    ];
}