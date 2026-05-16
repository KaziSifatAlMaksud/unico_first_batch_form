<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class AdlAssessment extends Model
{
    use HasFactory;

    protected $table = 'adl_assessments';

    protected $fillable = [

        // Patient Info
        'patient_name',
        'uhid',
        'age',
        'gender',
        'assessment_date',
        'assessment_time',
        'height_cm',
        'weight_kg',
        'bmi',
        'location',
        'consultant',

        // BADL
        'badl_0_loa',
        'badl_0_rem',
        'badl_1_loa',
        'badl_1_rem',
        'badl_2_loa',
        'badl_2_rem',
        'badl_3_loa',
        'badl_3_rem',
        'badl_4_loa',
        'badl_4_rem',
        'badl_5_loa',
        'badl_5_rem',
        'badl_6_loa',
        'badl_6_rem',

        // Mobility
        'mob_0_loa',
        'mob_0_rem',
        'mob_1_loa',
        'mob_1_rem',
        'mob_2_loa',
        'mob_2_rem',
        'mob_3_loa',
        'mob_3_rem',
        'mob_4_loa',
        'mob_4_rem',

        // IADL
        'iadl_0_loa',
        'iadl_0_rem',
        'iadl_1_loa',
        'iadl_1_rem',
        'iadl_2_loa',
        'iadl_2_rem',
        'iadl_3_loa',
        'iadl_3_rem',
        'iadl_4_loa',
        'iadl_4_rem',
        'iadl_5_loa',
        'iadl_5_rem',
        'iadl_6_loa',
        'iadl_6_rem',

        // Functional Tolerance
        'ft_symptom',
        'ft_others',
        'borg_rpe',
        'rest_breaks',
        'assistive',
        'assistive_others',
        'falls_6m',
        'fear_fall',
        'env_barriers',
        'sleep_dist',
        'sleep_remarks',

        // Overall Status
        'adl_status',
        'adl_prog',
        'adl_prog_remarks',
        'recommendation',
        'education',
        'education_date',

        // Signature
        'physio_name',
        'physio_datetime',
        'verified_name',
        'emp_id',
    ];
}