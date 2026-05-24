<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class IsbarHandover extends Model
{
    protected $table = 'isbar_handovers';

    protected $fillable = [

        'patient_name',
        'uhid',

        'handover_date',
        'handover_time',

        'patient_condition',
        'vital_status',
        'vital_status_details',

        'post_procedure_concern',
        'medication_issues',

        'lines_devices',

        'situation_details',

        'diagnosis',

        'history',
        'history_others',

        'surgery_history',

        'allergy',
        'allergy_drug',
        'allergy_food',
        'allergy_other',

        'additional_background',

        'vs_hr',
        'vs_bp',
        'vs_rr',
        'vs_temp',
        'vs_spo2',
        'vs_pain',

        'consciousness',
        'consciousness_gcs',

        'critical_investigations',
        'assessment_notes',

        'action',

        'action_monitoring',
        'action_doctor',
        'action_medication',
        'action_investigations',
        'action_escalation',

        'recommendation_plan',
    ];

    // protected $casts = [
    //     'patient_condition' => 'array',
    //     'vital_status' => 'array',
    //     'lines_devices' => 'array',
    //     'history' => 'array',
    //     'allergy' => 'array',
    //     'consciousness' => 'array',
    //     'action' => 'array',
    // ];
}