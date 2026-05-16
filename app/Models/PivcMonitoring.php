<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PivcMonitoring extends Model
{
    use HasFactory;

    protected $table = 'pivc_monitorings';

    protected $fillable = [
        'patient_name',
        'uhid',

        'location',
        'location_other',

        'cannula_date',
        'cannula_time',
        'primary_diagnosis',

        'site',
        'site_other',

        'indication',
        'indication_other',

        'aseptic_technique',
        'topical_anesthetic',

        'transparent_film',
        'sterile_compress',
        'dressing_change',

        'insp_schedule',
        'hand_hygiene',
        'aseptic_care',
        'pivc_patency',
        'pivc_flushed',
        'unused_flushed',
        'saline_flush',
        'flush_amount',

        'pain_score',
        'reported_rn',
        'reviewed_icn',
        'note_admin',

        'remove_no_indication',
        'remove_malfunction',
        'remove_phlebitis',
        'firm_pressure',
        'replacement_new_site',

        'integrity_checked',
        'removal_date',
        'removal_time',
        'removal_reason',

        'freq_assessment',
        'date_marked',
        'swelling_pain',
        'breach_sterility',
        'complication',
        'multi_puncture',
        'site_changed',

        'expert_help',
        'expert_name',
        'next_review',

        'signoff_icn',
        'verified_by',
    ];
}