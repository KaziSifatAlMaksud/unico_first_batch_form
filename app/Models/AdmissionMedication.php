<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

use App\Models\AdmissionNoteIcu;

class AdmissionMedication extends Model
{
    use HasFactory;

    protected $table = 'admission_medications';

    protected $fillable = [
        'admission_id',
        'med_name',
        'med_dose',
        'med_route',
        'med_indication',
        'med_notes',
    ];

    /**
     * Relationship: Medication belongs to an Admission
     */

    public function admission()
    {
         return $this->hasMany(AdmissionMedication::class, 'admission_id');
    }
}