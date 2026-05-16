<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class AllergyRecord extends Model
{
    use HasFactory;

    protected $table = 'allergy_records';

    protected $fillable = [
        'patient_name',
        'uhid',
        'gender',
        'age',
        'weight',
        'height',
        'location',
        'assess_date',
        'assess_time',

        'known_allergy',
        'allergy_type',
        'ai_severity',
        'ai_reaction',
        'ai_reaction_desc',
        'ai_date_noted',
        'ai_documented',
        'ai_source',

        'drug_name',
        'drug_reaction_date',
        'drug_reaction_obs',
        'drug_severity',
        'drug_reaction_type',
        'drug_precautions',
        'drug_notes_yn',
        'drug_notes',

        'food_allergen',
        'food_reaction_date',
        'food_reaction_obs',
        'food_severity',
        'food_reaction_type',
        'food_precautions',
        'food_notes_yn',
        'food_notes',

        'bracelet',
        'emr_alert',
        'special_diet',
        'pre_med',
        'staff_informed',
        'other_precautions',
        'other_precautions_txt',
        'int_notes',

        'physician_name',
        'physician_sig',
        'physician_datetime',

        'nurse_name',
        'nurse_sig',
        'nurse_datetime',

        'verified_by',
        'verified_sig',
        'verified_datetime',
    ];

    // protected $casts = [
    //     'assess_date' => 'date',
    //     'drug_reaction_date' => 'date',
    //     'food_reaction_date' => 'date',
    //     'physician_datetime' => 'datetime',
    //     'nurse_datetime' => 'datetime',
    //     'verified_datetime' => 'datetime',
    // ];
}