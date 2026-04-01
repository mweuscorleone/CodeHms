<?php
use App\Http\Controllers\EmployeeController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\PatientController;

Route::get('/user', function (Request $request) {
    return $request->user();
})->middleware('auth:sanctum');
Route::post('/employees', [EmployeeController::class, 'store']);
Route::post('/employee-login', [AuthController::class, 'login']);
Route::middleware('auth:sanctum')->group(function(){

    Route::post('/employee-logout', [AuthController::class, 'logout']);

});
Route::post('/password-reset', [AuthController::class, 'resetPassword']);
Route::post('/register-patient', [PatientController::class, 'store']);
Route::post('/patient-checkin', [PatientController::class, 'checkin']);