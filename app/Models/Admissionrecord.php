<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class AdmissionRecord extends Model
{
    use HasFactory;

    protected $table = 'admission_records';

    protected $fillable = [
        // Header
        
        'admission_date',
        'initiated_at',
        'admission_method',
        'bystander_present',

        // General
        'general_condition',
        'respiratory_support',
        'respiratory_support_detail',
        'mother_tongue',
        'can_speak',
        'has_lines_drains',
        'height_cm',
        'weight_kg',
        'cultural_needs',
        'allergies',
        'pain_present',

        // GCS
        'gcs_eyes',
        'gcs_verbal',
        'gcs_motor',

        // Vitals
        'temp_fahrenheit',
        'pulse_per_min',
        'resp_rate_per_min',
        'bp_systolic',
        'bp_diastolic',
        'spo2_percent',

        // Ventilation
        'ventilation_type',

        // Orientation
        'oriented_side_rails',
        'oriented_privacy',
        'oriented_visitor_policy',

        // Personal aids
        'dentures',
        'eyewear',
        'hearing_aid',

        // DVT summary
        'dvt_wells_total',
        'dvt_risk_level',

        'created_by',
    ];

}