<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\API\{AuthController, DosenController, MahasiswaController, NewsController, ProposalSkripsiController};

Route::middleware('auth:sanctum')->group(function () {
    Route::controller(AuthController::class)->group(function () {
        Route::post('/auth/logout', 'logout');
    });

    Route::controller(MahasiswaController::class)->group(function () {
        Route::get('/mahasiswa/{user}/get', 'getUser');
        Route::patch('/mahasiswa/{user}/update', 'updateUser');
        Route::delete('/mahasiswa/{user}/delete', 'deleteUser');
    });

    Route::controller(NewsController::class)->group(function () {
        Route::get('/pengumuman', 'index');
        Route::post('/pengumuman/simpan', 'simpan');
    });
});
Route::post('/auth/register', [AuthController::class, 'createUser']);
Route::post('/auth/login', [AuthController::class, 'loginUser']);

// Route::controller(MahasiswaController::class)->group(function () {
//     Route::get('/mahasiswa', 'index');
//     Route::post('/mahasiswa/simpan', 'simpan');
//     Route::patch('/mahasiswa/{mahasiswa}/update', 'update');
//     Route::delete('/mahasiswa/{mahasiswa}/hapus', 'hapus');
// });

Route::controller(DosenController::class)->group(function () {
    Route::get('/dosen', 'index');
    Route::post('/dosen/simpan', 'simpan');
    Route::patch('/dosen/{dosen}/update', 'update');
    Route::delete('/dosen/{dosen}/hapus', 'hapus');
});

Route::get('/proposal', [ProposalSkripsiController::class, 'index']);
