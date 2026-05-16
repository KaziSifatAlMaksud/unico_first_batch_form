<?php

namespace App\Http\Controllers;

use App\Models\Doctor;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class DoctorController extends Controller
{


    public function index()
    {
        // $doctors = Doctor::all()->with('specialization', 'department');
        
        $doctors = Doctor::with('department', 'specialization')->get();
        // $doctors = Doctor::with('specialization', 'department')->get();
        +
        $totalDoctors = $doctors->count();
        $activeDoctors = $doctors->where('status', 'active')->count();

        return view('doctor.index', compact('doctors', 'totalDoctors', 'activeDoctors'));
    }
    public function store(Request $request)
    {
        $request->validate([
            'first_name' => 'required',
            'last_name' => 'required',
            'phone' => 'required',
            'email' => 'required|email',
            'specialization_id' => 'required',
            'department_id' => 'required',
            'bmdc_reg_no' => 'required'
        ]);

       Doctor::create([
            'title' => $request->title,
            'first_name' => $request->first_name,
            'middle_name' => $request->middle_name,
            'last_name' => $request->last_name,
            'gender' => $request->gender,
            'dob' => $request->dob,
            'nationality' => $request->nationality,

            // FIXED MAPPING
            'nid' => $request->nid_passport,
            'experience' => $request->experience,

            'phone' => $request->phone,
            'email' => $request->email,
            'address' => $request->address,

            'specialization_id' => (int) $request->specialization_id,
            'department_id' => (int) $request->department_id,

            'bmdc_reg_no' => $request->bmdc_reg_no,
            'joining_date' => $request->joining_date,
            'designation' => $request->designation,

            'employee_id' => 'DOC-' . rand(1000, 9999),
            'status' => $request->status,

            'bio' => $request->bio,

            'consultation_fee' => $request->consultation_fee,
            'followup_fee' => $request->followup_fee,
            'emergency_fee' => $request->emergency_fee,
            'chamber_room' => $request->chamber_room
        ]);

        return redirect()->route('doctors')->with('success', 'Doctor added successfully');
    }
}
