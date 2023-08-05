<?php

use App\Http\Controllers\Api\AuthController;
use App\Http\Controllers\Api\CidadeController;
use App\Http\Controllers\Api\MedicoController;
use App\Http\Controllers\Api\PacienteController;
use App\Models\Paciente;
use Illuminate\Http\Request;
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

Route::get('/cidades', [CidadeController::class, 'index']);

Route::get('/medicos', [MedicoController::class, 'index']);
Route::get('/cidades/{id_cidade}/medicos', [MedicoController::class, 'getDoctorsByCity']);

Route::middleware('auth:api')->group(function () {
    Route::get('/user', [AuthController::class, 'getUser']);

    Route::post('/medicos', [MedicoController::class, 'create']);

    Route::post('/medicos/{id_medico}/pacientes', [MedicoController::class, 'linkPatientToDoctor']);
    Route::get('/medicos/{id_medico}/pacientes', [PacienteController::class, 'getPatientsByDoctor']);

    Route::put('/pacientes/{id}', [PacienteController::class, 'update']);
    Route::post('/pacientes', [PacienteController::class, 'create']);
});
