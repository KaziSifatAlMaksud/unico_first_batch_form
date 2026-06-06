<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\PatientRegistration;

class PatientRegistrationController extends Controller
{


    public function register_status_update(Request $request, $id, $status)
    {
        $patient = PatientRegistration::find($id);

        if (!$patient) {
            return response()->json([
                'status' => false,
                'message' => 'Patient not found'
            ], 404);
        }

        $allowed = ['active', 'inactive', 'registered', 'blocked', 'nonregistered'];

        if (!in_array($status, $allowed)) {
            return response()->json([
                'status' => false,
                'message' => 'Invalid status'
            ], 400);
        }

        $patient->status = $status;
        $patient->save();

        return response()->json([
            'status' => true,
            'message' => 'Status updated successfully',
            'data' => $patient
        ]);
    }


     public function search_detail($id)
    {
        try {

            $patient = PatientRegistration::findOrFail($id)->where('created_at', 'desc')->first();

            $result = [
                'id' => $patient->id,
                'full_name' => $patient->full_name,
                'mother_name' => $patient->mother_name,
                'father_name' => $patient->father_name,
                'age' => $patient->age,
                'religion' => $patient->religion,
                'gender' => $patient->gender,
                'marital_status' => $patient->marital_status,
                'email' => $patient->email,
                'district' => $patient->district,
                'thana' => $patient->thana,
                'address' => $patient->address,
                'heard_about_us' => $patient->heard_about_us,
                'patient_category' => $patient->patient_category,
                'dob' => $patient->dob,
                'ec_name' => $patient->ec_name,
                'ec_mobile' => $patient->ec_mobile,
                'mobile' => $patient->mobile,
                'status' => $patient->status,
                'created_at' => $patient->created_at,
                'updated_at' => $patient->updated_at,

                'patient_photo' => $patient->patient_photo
                    ? base64_encode($patient->patient_photo)
                    : null,

                'patient_photo_type' => $patient->patient_photo_type,
            ];

            return response()->json([
                'status' => true,
                'message' => 'Patient found successfully.',
                'data' => $result
            ], 200);

        } catch (\Illuminate\Database\Eloquent\ModelNotFoundException $e) {

            return response()->json([
                'status' => false,
                'message' => 'Patient not found.'
            ], 404);

        } catch (\Exception $e) {

            return response()->json([
                'status' => false,
                'message' => 'Something went wrong.',
                'error' => $e->getMessage()
            ], 500);
        }
    }

  public function search(Request $request)
    {
        try {

            $term = trim($request->term);

            if (empty($term)) {
                return response()->json([
                    'status'  => false,
                    'message' => 'Search term is required.',
                    'data'    => []
                ], 400);
            }

         $results = PatientRegistration::where(function ($query) use ($term) {
                $query->where('full_name', 'LIKE', "%{$term}%")
                    ->orWhere('mobile', 'LIKE', "%{$term}%");
            })
            ->where('status', 'nonregistered')
            ->limit(15)
            ->get();

            $results = $results->map(function ($patient) {

            return [
                    'id' => $patient->id,
                    'full_name' => $patient->full_name,
                    'mother_name' => $patient->mother_name,
                    'father_name' => $patient->father_name,
                    'age' => $patient->age,
                    'religion' => $patient->religion,
                    'gender' => $patient->gender,
                    'marital_status' => $patient->marital_status,
                    'email' => $patient->email,
                    'district' => $patient->district,
                    'thana' => $patient->thana,
                    'address' => $patient->address,
                    'heard_about_us' => $patient->heard_about_us,
                    'patient_category' => $patient->patient_category,
                    'dob' => $patient->dob,
                    'ec_name' => $patient->ec_name,
                    'ec_mobile' => $patient->ec_mobile,
                    'mobile' => $patient->mobile,
                    'status' => $patient->status,
                    'created_at' => $patient->created_at,
                    'updated_at' => $patient->updated_at,

                    // ✅ FIX IMAGE HERE
                    'patient_photo' => $patient->patient_photo
                        ? base64_encode($patient->patient_photo)
                        : null,

                    'patient_photo_type' => $patient->patient_photo_type,
                ];
            });

            if ($results->isEmpty()) {
                return response()->json([
                    'status'  => false,
                    'message' => 'No patient found.',
                    'data'    => []
                ], 404);
            }

            return response()->json([
                'status'  => true,
                'message' => 'Patients found successfully.',
                'data'    => $results
            ], 200);

        } catch (\Exception $e) {

            return response()->json([
                'status'  => false,
                'message' => 'Something went wrong.',
                'error'   => $e->getMessage()
            ], 500);
        }
    }

     public function search_all(Request $request)
    {
        try {

            $term = trim($request->term);

            if (empty($term)) {
                return response()->json([
                    'status'  => false,
                    'message' => 'Search term is required.',
                    'data'    => []
                ], 400);
            }

            $results = PatientRegistration::where('full_name', 'LIKE', "%{$term}%")
                ->orWhere('mobile', 'LIKE', "%{$term}%")
                ->limit(15)
                ->get(['id', 'full_name','mother_name','father_name','age','religion','gender', 'marital_status','email','district','thana','address','heard_about_us','patient_category', 'dob','ec_name','ec_mobile','mobile', 'created_at', 'updated_at', 'patient_photo', 'patient_photo_type']);

            if ($results->isEmpty()) {
                return response()->json([
                    'status'  => false,
                    'message' => 'No patient found.',
                    'data'    => []
                ], 404);
            }

            return response()->json([
                'status'  => true,
                'message' => 'Patients found successfully.',
                'data'    => $results
            ], 200);

        } catch (\Exception $e) {

            return response()->json([
                'status'  => false,
                'message' => 'Something went wrong.',
                'error'   => $e->getMessage()
            ], 500);
        }
    }


       public function store(Request $request)
    {

        $validated = $request->validate([

            // 'patient_photo'     => 'required|image|mimes:jpg,jpeg,png,webp|max:5120',
            'full_name'         => 'required|string|max:255',
            'mother_name'       => 'nullable|string|max:255',
            'father_name'       => 'nullable|string|max:255',
            'religion'          => 'required|string|max:100',
            'gender'            => 'required|string|max:20',
            'marital_status'    => 'required|string',
            // 'spouse_name'       => 'nullable|string|max:255',
            'mobile'            => 'required|numeric|digits:11',
            'email'             => 'nullable|email|max:255',
            'district'          => 'required|string|max:255',
            'thana'             => 'required|string|max:255',
            'address'           => 'required|string',
            'ec_name'           => 'required|string|max:255',
            'ec_mobile'         => 'required|numeric|digits:11',
            'heard_about_us'    => 'required|string|max:255',
            'patient_category'  => 'required|string|max:255',
              'terms' => 'accepted',
        ]);



        // spouse validation
        // if ($request->marital_status == 'Married' && empty($request->spouse_name)) {

        //     return response()->json([
        //         'status' => false,
        //         'errors' => [
        //             'spouse_name' => ['Spouse name is required for married patients.']
        //         ]
        //     ], 422);
        // }



       // upload image as binary
        $photoData = null;
        $photoType = null;

        if ($request->hasFile('patient_photo')) {

            $photo = $request->file('patient_photo');

            $photoData = file_get_contents($photo->getRealPath());
            $photoType = $photo->getMimeType();
        }



        // save data
        $patient = new PatientRegistration();

        $patient->patient_photo    = $photoData;
        $patient->patient_photo_type = $photoType;

        $patient->full_name        = $request->full_name;
        $patient->mother_name      = $request->mother_name;
        $patient->father_name      = $request->father_name;
        $patient->age = $request->age_year . '-' . $request->age_month . '-' . $request->age_day;
        $patient->religion         = $request->religion;
        $patient->gender           = $request->gender;
        $patient->dob              = $request->dob;

        $patient->marital_status   = $request->marital_status;
        // $patient->spouse_name      = $request->spouse_name;

        $patient->mobile           = $request->mobile;
        $patient->email            = $request->email;
        $patient->nid              = $request->nid;

        $patient->district         = $request->district;
        $patient->thana            = $request->thana;
        $patient->address          = $request->address;
        $patient->ec_name          = $request->ec_name;
        $patient->ec_mobile        = $request->ec_mobile;

        $patient->heard_about_us   = $request->heard_about_us;
        $patient->patient_category = $request->patient_category;

         $patient->save();


        return response()->json([
            'message' => 'Patient registered successfully!',
            'id' => $patient->id
        ]);
    }

    // public function store(Request $request)
    // {

    //     $validated = $request->validate([

    //         // 'patient_photo'     => 'required|image|mimes:jpg,jpeg,png,webp|max:5120',
    //         'full_name'         => 'required|string|max:255',
    //         'mother_name'       => 'nullable|string|max:255',
    //         'father_name'       => 'nullable|string|max:255',
    //         'religion'          => 'required|string|max:100',
    //         'gender'            => 'required|string|max:20',
    //         'marital_status'    => 'required|string',
    //         // 'spouse_name'       => 'nullable|string|max:255',
    //         'mobile'            => 'required|numeric|digits:11',
    //         'email'             => 'nullable|email|max:255',
    //         'district'          => 'required|string|max:255',
    //         'thana'             => 'required|string|max:255',
    //         'address'           => 'required|string',
    //         'ec_name'           => 'required|string|max:255',
    //         'ec_mobile'         => 'required|numeric|digits:11',
    //         'heard_about_us'    => 'required|string|max:255',
    //         'patient_category'  => 'required|string|max:255',
    //     ]);



    //     // spouse validation
    //     // if ($request->marital_status == 'Married' && empty($request->spouse_name)) {

    //     //     return response()->json([
    //     //         'status' => false,
    //     //         'errors' => [
    //     //             'spouse_name' => ['Spouse name is required for married patients.']
    //     //         ]
    //     //     ], 422);
    //     // }



    //     // upload image
    //     $photoName = null;

    //     if ($request->hasFile('patient_photo')) {

    //         $photo = $request->file('patient_photo');

    //         $photoName = time().'_'.$photo->getClientOriginalName();

    //         $photo->move(public_path('uploads/patient'), $photoName);
    //     }



    //     // save data
    //     $patient = new PatientRegistration();

    //     $patient->patient_photo    = $photoName;

    //     $patient->full_name        = $request->full_name;
    //     $patient->mother_name      = $request->mother_name;
    //     $patient->father_name      = $request->father_name;
    //     $patient->age = $request->age_year . '-' . $request->age_month . '-' . $request->age_day;
    //     $patient->religion         = $request->religion;
    //     $patient->gender           = $request->gender;
    //     $patient->dob              = $request->dob;

    //     $patient->marital_status   = $request->marital_status;
    //     // $patient->spouse_name      = $request->spouse_name;

    //     $patient->mobile           = $request->mobile;
    //     $patient->email            = $request->email;

    //     $patient->district         = $request->district;
    //     $patient->thana            = $request->thana;
    //     $patient->address          = $request->address;
    //     $patient->ec_name          = $request->ec_name;
    //     $patient->ec_mobile        = $request->ec_mobile;

    //     $patient->heard_about_us   = $request->heard_about_us;
    //     $patient->patient_category = $request->patient_category;

    //      $patient->save();


    //     return response()->json([
    //         'message' => 'Patient registered successfully!',
    //         'id' => $patient->id
    //     ]);
    // }
}