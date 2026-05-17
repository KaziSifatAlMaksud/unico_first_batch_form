<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class PalliativeCareNote extends Model
{
    protected $table = 'palliative_care_notes';

    protected $fillable = [

        'patient_name',
        'uhid',
        'gender',
        'age',
        'procedure_name',
        'diagnosis',
        'consultant',
        'unit_bed',
        'date_of_note',
        'time_of_note',

        'gcs_obs',
        'gcs_rem',

        'vitals_obs',
        'vitals_rem',

        'temp_obs',
        'temp_rem',

        'pain_obs',
        'pain_rem',

        'resp_obs',
        'resp_rem',

        'cardiac_obs',
        'cardiac_rem',

        'fluid_obs',
        'fluid_rem',

        'skin_obs',
        'skin_rem',

        'other_obs',
        'other_rem',

        'pain_int',
        'pain_rmk',

        'dysp_int',
        'dysp_rmk',

        'anx_int',
        'anx_rmk',

        'nausea_int',
        'nausea_rmk',

        'sec_int',
        'sec_rmk',

        'othersym_int',
        'othersym_rmk',

        'comfort',
        'family',
        'directive',
        'nursing_notes',

        'death_date',
        'death_time',
        'verifying_physician',
        'family_informed',
        'postmortem',

        'nurse_sig',
        'nurse_date',
        'nurse_time',

        'consult_sig',
        'consult_date2',
        'consult_time2',

        'verified_sig',
        'verified_date',
        'verified_time',
    ];

    protected $casts = [
        'comfort' => 'array',
        'family' => 'array',
        'directive' => 'array',
    ];
}