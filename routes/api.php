<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\API\MahasiswaController;

Route::controller(MahasiswaController::class)->group(function () {
    Route::get('/mahasiswa', 'index');
    Route::post('/mahasiswa/simpan', 'simpan');
    Route::patch('/mahasiswa/{mahasiswa}/update', 'update');
    Route::delete('/mahasiswa/{mahasiswa}/hapus', 'hapus');
});
