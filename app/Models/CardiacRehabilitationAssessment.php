<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class CardiacRehabilitationAssessment extends Model
{
    use HasFactory;

    protected $table = 'cardiac_rehabilitation_assessments';

    protected $fillable = [
        'patient_name',
        'uhid',
        'age',
        'gender',
        'weight',
        'height',
        'bmi',
        'location',
        'admission_date',
        'initiated_at',
        'admission_method',
        'bystander_present',
        'consultant_present',

        'p_diagnosis',
        'cardiac_event_duration',
        'left_ventricular_function',
        'ef_percent',
        'diagnosis_text',
        'planned_procedure',
        'dos_date',

        'pulse_per_min',
        'bp_systolic',
        'bp_diastolic',
        'temp_fahrenheit',
        'resp_rate',
        'spo2_percent',

        'heart_rhythm',
        'symptoms_rest',
        'symptoms_rest_others',

        'contraindication',

        'comorbidity',
        'obesity_bmi',
        'smoking',

        'walk_distance',

        'pretest_hr',
        'pretest_bp_sys',
        'pretest_bp_dia',
        'pretest_spo2',

        'posttest_hr',
        'posttest_bp_sys',
        'posttest_bp_dia',
        'posttest_spo2',

        'mets_estimated',
        'mets_value',
        'borg_rest',
        'borg_peak',

        'activity_level',
        'breathing_pattern',
        'breathing_specify',

        'spiro_insp',
        'spiro_exp',
        'spiro_remarks',

        'spirometry_needed',
        'fev1',
        'fvc',

        'posture',
        'alertness',

        'rom',
        'rom_specify',

        'muscle_power',
        'muscle_specify',

        'bed_mobility',
        'sit_stand',

        'sitting_balance',
        'sitting_dyn',

        'standing_balance',
        'standing_dyn',

        'gait_5m',
        'transfer_status',

        'stair_climbing',
        'tug_seconds',
        'tug_risk',

        'limiting_symptom',
        'nyha_class',

        'motivation_cr',

        'anxiety_depression',
        'anxiety_specify',

        'social_support',
        'social_specify',

        'aacvpr_risk',
        'cr_enrollment',
        'reassess_date',
        'spiro_insp_remarks',
        'spiro_exp_remarks',

        'physio_name',
        'physio_datetime',
        'verified_by',
        'emp_id',
    ];

    // protected $casts = [
    //     'admission_date' => 'date',
    //     'dos_date' => 'date',
    //     'reassess_date' => 'date',
    //     'physio_datetime' => 'datetime',
    // ];
}