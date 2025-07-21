<?php

use App\Http\Controllers\DosenController;
use App\Http\Controllers\MahasiswaController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

Route::get('/user', function (Request $request) {
    return $request->user();
})->middleware('auth:sanctum');

Route::get('/mahasiswa', [MahasiswaController::class, 'index']);
Route::post('/mahasiswa', [MahasiswaController::class, 'store']);
Route::get('/mahasiswa/{id}', [MahasiswaController::class, 'show']);
Route::put('/mahasiswa/{id}', [MahasiswaController::class, 'update']); // Gunakan ID
Route::patch('/mahasiswa/{id}', [MahasiswaController::class, 'update']); // Gunakan ID
Route::delete('/mahasiswa/{id}', [MahasiswaController::class, 'destroy']); // Gunakan ID

Route::get('/dosen', [DosenController::class, 'index']);
Route::post('/dosen', [DosenController::class, 'store']);
Route::get('/dosen/{id}', [DosenController::class, 'show']);
Route::put('/dosen/{id}', [DosenController::class, 'update']); // Gunakan ID
Route::patch('/dosen/{id}', [DosenController::class, 'update']); // Gunakan ID
Route::delete('/dosen/{id}', [DosenController::class, 'destroy']); // Gunakan ID
