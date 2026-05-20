<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\PatientRegistration;

class PatientRegistrationController extends Controller
{
    public function store(Request $request)
    {

        $validated = $request->validate([

            // 'patient_photo'     => 'required|image|mimes:jpg,jpeg,png,webp|max:5120',
            'full_name'         => 'required|string|max:255',
            'mother_name'       => 'required|string|max:255',
            'father_name'       => 'required|string|max:255',

            'religion'          => 'required|string|max:100',
            'gender'            => 'required|string|max:20',

            'marital_status'    => 'required|string',

            'spouse_name'       => 'nullable|string|max:255',

            'mobile'            => 'required|string|max:20',
            'email'             => 'required|email|max:255',

            'district'          => 'required|string|max:255',
            'thana'             => 'required|string|max:255',
            'address'           => 'required|string',

            'heard_about_us'    => 'required|string|max:255',
            'patient_category'  => 'required|string|max:255',
        ]);



        // spouse validation
        if ($request->marital_status == 'Married' && empty($request->spouse_name)) {

            return response()->json([
                'status' => false,
                'errors' => [
                    'spouse_name' => ['Spouse name is required for married patients.']
                ]
            ], 422);
        }



        // upload image
        $photoName = null;

        if ($request->hasFile('patient_photo')) {

            $photo = $request->file('patient_photo');

            $photoName = time().'_'.$photo->getClientOriginalName();

            $photo->move(public_path('uploads/patient'), $photoName);
        }



        // save data
        $patient = new PatientRegistration();

        $patient->patient_photo    = $photoName;

        $patient->full_name        = $request->full_name;
        $patient->mother_name      = $request->mother_name;
        $patient->father_name      = $request->father_name;
        $patient->age = $request->age_year . '-' . $request->age_month . '-' . $request->age_day;
        $patient->religion         = $request->religion;
        $patient->gender           = $request->gender;
        $patient->dob              = $request->dob;

        $patient->marital_status   = $request->marital_status;
        $patient->spouse_name      = $request->spouse_name;

        $patient->mobile           = $request->mobile;
        $patient->email            = $request->email;

        $patient->district         = $request->district;
        $patient->thana            = $request->thana;
        $patient->address          = $request->address;

        $patient->heard_about_us   = $request->heard_about_us;
        $patient->patient_category = $request->patient_category;

        $patient->save();


        return view('PatientRegistration.index', [
            'success' => 'Patient registration successful.'
        ]);
    }
}