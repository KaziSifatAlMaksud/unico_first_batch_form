<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class EndOfLifeCareForm extends Model
{
    use HasFactory;

    protected $table = 'end_of_life_care_forms';

    protected $fillable = [

        // Patient Info
        'patient_name',
        'uhid',
        'gender',
        'age',
        'department',
        'bed_cabin',
        'consultant',

        // Consultant Row
        'consultant2',
        'dept2',
        'consult_date',

        // Plan of Care
        'plan',
        'plan_other',

        // Awareness of Diagnosis
        'aware_diag_pt',
        'aware_diag_fam',

        // Recognition of Dying Status
        'recog_dying_pt',
        'recog_dying_fam',

        // Communication of Bad News
        'comm_bed_pt',
        'comm_bed_fam',

        // Plan explained
        'plan_exp_pt',
        'plan_exp_fam',

        // Understanding
        'understand_pt',
        'understand_fam',

        // Psychological Stressors
        'psych_pt',
        'psych_fam',

        // Clinical Psychologist
        'clin_psych',

        // Social Stressors
        'social_pt',
        'social_fam',

        // Medical Social Worker
        'msw',

        // Religious / Spiritual
        'relig_pt',
        'relig_fam',

        // Traditional Needs
        'trad_needs',
        'trad_needs_specify',

        // Special Needs
        'special_needs',
        'special_needs_specify',

        // Doctor Signature
        'doc_name',
        'doc_empid',
        'doc_date',
        'doc_time',

        // Verified By
        'ver_name',
        'ver_empid',
        'ver_date',
        'ver_time',
    ];
}