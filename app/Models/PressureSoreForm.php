<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PressureSoreForm extends Model
{
    use HasFactory;

    protected $table = 'pressure_sore_forms';

    protected $fillable = [

        // Patient Info
        'patient_name',
        'uhid',
        'location',
        'location_other',
        'bed_no',
        'admission_date',
        'primary_diagnosis',

        // Mobility & Nutrition
        'mobility',
        'nutrition',

        // Pressure Sore Details
        'detection_datetime',
        'sore_locations',

        // Size
        'size_l',
        'size_w',
        'size_d',

        // Appearance
        'color',
        'color_other',
        'exudate',
        'odor',
        'skin_cond',

        // Stage
        'stage',

        // Reporting
        'reported_by',
        'reviewed_by_icn',
        'note_cns',

        // Monitoring
        'repo_schedule',
        'pressure_device',
        'dressing_type',
        'topical_meds',
        'topical_meds_detail',
        'wc_team',
        'pain_score',
        'pain_char',

        // Care
        'freq_assessment',
        'progress',
        'next_review_date',
        'progress_note',
        'remarks',

        // Photos
        'wound_photo_1',
        'wound_photo_2',
        'wound_photo_3',

        // Signature
        'signoff_name',
        'signoff_emp_id',
        'signoff_datetime',

        'verified_name',
        'verified_emp_id',
        'verified_datetime',
    ];
}