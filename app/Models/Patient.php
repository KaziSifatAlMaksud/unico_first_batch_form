<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\SoftDeletes;

class Patient extends Model
{
    use HasFactory, SoftDeletes;

    protected $table = 'patients';

    protected $fillable = [
        'full_name',
        'date_of_birth',
        'gender',
        'national_id',
        'contact_phone',
    ];

    protected $casts = [
        'date_of_birth' => 'date',
    ];

    // ── Relationships ────────────────────────────────────────
    public function admissions()
    {
        return $this->hasMany(AdmissionRecord::class, 'patient_id');
    }

    public function latestAdmission()
    {
        return $this->hasOne(AdmissionRecord::class, 'patient_id')->latestOfMany();
    }
}
