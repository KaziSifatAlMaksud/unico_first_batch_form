<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\NursingAdmission;

class CarePlan extends Model
{
    use HasFactory;

    protected $table = 'care_plans';

    protected $fillable = [
        'admission_id',
        'care_time',
        'care_diag',
        'care_goals',
        'care_interv',
        'care_eval',
        'care_sign',
    ];

    /*
    |--------------------------------------------------------------------------
    | RELATIONSHIP
    |--------------------------------------------------------------------------
    */

    // CarePlan belongs to NursingAdmission
    public function admission()
    {
        return $this->belongsTo(NursingAdmission::class, 'admission_id', 'id');
    }
}