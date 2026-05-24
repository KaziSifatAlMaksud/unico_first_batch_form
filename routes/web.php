<?php

use Illuminate\Support\Facades\Route;

use App\Http\Controllers\DoctorController;
use Illuminate\Http\Request;
use App\Models\PatientRegistration;

use App\Http\Controllers\AdmissionController;
use App\Http\Controllers\FormController;
use App\Http\Controllers\PatientRegistrationController;
/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/


Route::get('/patientregistration', function () { return view('PatientRegistration.index');})->name('patient_registration');

// Route::get('/patientregistration/success', function () { return view('PatientRegistration.Success_page');})->name('patient_registration.success');


Route::get('/patientregistration/success', function (Request $request) {

    $patientId = $request->query('patient_id');

    $latestEntry = PatientRegistration::find($patientId);

    if (!$latestEntry) {
        return redirect()->route('patient_registration')
            ->with('error', 'Patient not found.');
    }

    return view('PatientRegistration.Success_page', compact('latestEntry'));
});


Route::post('/patient-registration/store', [PatientRegistrationController::class, 'store'])
    ->name('patient.registration.store');

Route::get('/form_1', function () { return view('Form.form_1');})->name('form1');
Route::post('/form1/store', [FormController::class, 'store1'])->name('store_admission');
Route::get('/form_1_pdf', [FormController::class, 'print_view'])->name('print_view1');

Route::get('/form_2', function () { return view('Form.form2.form_2');})->name('form2');
Route::post('/form2/store', [FormController::class, 'store22'])->name('pressure.sore.store');
Route::get('/form_2_pdf', [FormController::class, 'print_view2'])->name('print_view2');


Route::get('/form_3', function () { return view('Form.form3.form_3');})->name('form3');
Route::post('/form3/store', [FormController::class, 'store3'])->name('form3.store');
Route::get('/form_3_pdf', [FormController::class, 'print_view3'])->name('print_view3');

Route::get('/form_4', function () { return view('Form.form4.form_4');})->name('form4');
Route::post('/form4/store', [FormController::class, 'store4'])->name('form4.store');
Route::get('/form_4_pdf', [FormController::class, 'print_view4'])->name('print_view4');


Route::get('/form_5', function () { return view('Form.form5.form_5');})->name('form5');
Route::post('/form5/store', [FormController::class, 'store5'])->name('form5.store');
Route::get('/form_5_pdf', [FormController::class, 'print_view5'])->name('print_view5');


Route::get('/form_6', function () { return view('Form.form6.form_6');})->name('form6');
Route::post('/form6/store', [FormController::class, 'store6'])->name('form6.store');
Route::get('/form_6_pdf', [FormController::class, 'print_view6'])->name('print_view6');

Route::get('/form_7', function () { return view('Form.form7.form_7');})->name('form7');
Route::post('/form7/store', [FormController::class, 'store7'])->name('form7.store');
Route::get('/form_7_pdf', [FormController::class, 'print_view7'])->name('print_view7');

Route::get('/form_8', function () { return view('Form.form8.form_8');})->name('form8');
Route::post('/form8/store', [FormController::class, 'store8'])->name('form8.store');
Route::get('/form_8_pdf', [FormController::class, 'print_view8'])->name('print_view8');



Route::get('/form_9', function () { return view('Form.form9.form_9');})->name('form9');
Route::post('/form9/store', [FormController::class, 'store9'])->name('form9.store');
Route::get('/form_9_pdf', [FormController::class, 'print_view9'])->name('print_view9');


Route::get('/form_10', function () { return view('Form.form10.form_10');})->name('form10');
Route::post('/form10/store', [FormController::class, 'store10'])->name('form10.store');
Route::get('/form_10_pdf', [FormController::class, 'print_view10'])->name('print_view10');


Route::get('/form_11', function () { return view('Form.form11.form_11');})->name('form11');
Route::post('/form11/store', [FormController::class, 'store11'])->name('form11.store');
// Route::get('/form_11_pdf', [FormController::class, 'print_view11'])->name('print_view11');

Route::get('/form_11_pdf', function () { return view('Form.form11.form_11_pdf');})->name('form11_pdf');
// Route::get('/form_1_pdf', function () { return 
// view('Form.form_1_pdf');
// })->name('form_1_pdf');























Route::get('/all_entries', function () {
    return view('add_entries');
})->name('all_entries');

// Route::post('/all_entries/store', [AdmissionController::class, 'store'])->name('store_admission');

Route::get('/admissions', [AdmissionController::class, 'details'])->name('admissions_details');
Route::get('/admissions/{id}', [AdmissionController::class, 'show'])->name('admission_show');



























Route::get('/details_entries', function () {
    return view('details_entries');
})->name('details_entries');

Route::get('/add_doctor', function () {
    return view('doctor.add-doctor');
})->name('add_doctor');

Route::get('/doctors', [DoctorController::class, 'index'])->name('doctors');
Route::post('/doctor/store', [DoctorController::class, 'store'])->name('store_doctor');

Route::get('/dashboard', function () {
})->middleware(['auth'])->name('dashboard');

require __DIR__.'/auth.php';
