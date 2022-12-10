<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\API\AuthController;
use App\Http\Controllers\API\DosenController;
use App\Http\Controllers\API\MahasiswaController;
use App\Http\Controllers\API\ProposalSkripsiController;

Route::post('/auth/register', [AuthController::class, 'createUser']);
Route::post('/auth/login', [AuthController::class, 'loginUser']);

Route::controller(MahasiswaController::class)->group(function () {
    Route::get('/mahasiswa', 'index');
    Route::post('/mahasiswa/simpan', 'simpan');
    Route::patch('/mahasiswa/{mahasiswa}/update', 'update');
    Route::delete('/mahasiswa/{mahasiswa}/hapus', 'hapus');
});

Route::controller(DosenController::class)->group(function () {
    Route::get('/dosen', 'index');
    Route::post('/dosen/simpan', 'simpan');
    Route::patch('/dosen/{dosen}/update', 'update');
    Route::delete('/dosen/{dosen}/hapus', 'hapus');
});

Route::get('/proposal', [ProposalSkripsiController::class, 'index']);
