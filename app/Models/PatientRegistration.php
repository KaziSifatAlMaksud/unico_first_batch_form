<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PatientRegistration extends Model
{
    use HasFactory;

    protected $table = 'patient_registration';

    protected $fillable = [

        // Photo
        'patient_photo',

        // Personal Information
        'full_name',
        'mother_name',
        'father_name',
        'age',
        'religion',
        'gender',
         'dob',

        // Marital Info
        'marital_status',
        'spouse_name',

        // Contact Details
        'mobile',
        'email',
        'district',
        'thana',
        'address',

        // Other Information
        'heard_about_us',
        'patient_category',
        'status',
    ];
}