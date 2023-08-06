<?php

use App\Http\Controllers\Api\AuthController;
use App\Http\Controllers\Api\CityController;
use App\Http\Controllers\Api\DoctorController;
use App\Http\Controllers\Api\PatientController;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "api" middleware group. Make something great!
|
*/

Route::post('/login', [AuthController::class, 'login']);

Route::get('/cidades', [CityController::class, 'index']);

Route::get('/medicos', [DoctorController::class, 'index']);

Route::get('/cidades/{id_cidade}/medicos', [DoctorController::class, 'getDoctorsByCity']);

Route::middleware('auth:api')->group(function () {
    Route::get('/user', [AuthController::class, 'getUser']);

    Route::controller(PatientController::class)->prefix('pacientes')->group(function () {
        Route::post('/', 'create');
        Route::put('/{id}', 'update');
    });

    Route::controller(DoctorController::class)->prefix('medicos')->group(function () {
        Route::post('/', 'create');
        Route::post('/{id_medico}/pacientes', 'linkPatientToDoctor');
    });

    Route::get('medicos/{id_medico}/pacientes', [PatientController::class, 'getPatientsByDoctor']);
});
