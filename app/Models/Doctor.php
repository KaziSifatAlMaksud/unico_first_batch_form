<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

use App\Models\Department;
use App\Models\Specialization;



class Doctor extends Model
{
    use HasFactory;

    protected $table = 'doctors';

    protected $fillable = [
        'title',
        'first_name',
        'middle_name',
        'last_name',
        'gender',
        'dob',
        'nationality',
        'nid_passport',
        'phone',
        'email',
        'address',

        'specialization_id',
        'department_id',
        'bmdc_reg_no',
        'experience',
        'joining_date',
        'designation',
        'employee_id',
        'status',
        'chamber_room',

        // 'qualifications',
        'bio',

        'consultation_fee',
        'followup_fee',
        'emergency_fee'

        // 'username',
        // 'password',
        // 'role'
    ];

    // protected $hidden = [
    //     'password',
    // ];

    // Auto hash password when setting it
    // public function setPasswordAttribute($value)
    // {
    //     $this->attributes['password'] = bcrypt($value);
    // }

    // // Full name helper (very useful for UI)
    // public function getFullNameAttribute()
    // {
    //     return trim($this->title.' '.$this->first_name.' '.$this->middle_name.' '.$this->last_name);
    // }

    // // Decode qualifications automatically (if stored as JSON)
    // public function getQualificationsAttribute($value)
    // {
    //     return json_decode($value, true);
    // }

    // // Encode qualifications before saving
    // public function setQualificationsAttribute($value)
    // {
    //     $this->attributes['qualifications'] = json_encode($value);
    // }

    public function department()
    {
        return $this->belongsTo(Department::class);
    }

    public function specialization()
    {
        return $this->belongsTo(Specialization::class);
    }
}
