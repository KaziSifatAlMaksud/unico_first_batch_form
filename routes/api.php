<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\PatientRegistrationController;
/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

Route::get('/patientRegistration_temp', [PatientRegistrationController::class, 'search']);
Route::get('/patientRegistration_all', [PatientRegistrationController::class, 'search_all'])->name('patient.search');
Route::get('/patientRegistration/{id}', [PatientRegistrationController::class, 'search_detail'])->name('patient.search.detail');

Route::post('/patient-registration/status_update/{id}/{status}', [PatientRegistrationController::class, 'register_status_update'])
    ->name('patient-registration.status-update');

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});
