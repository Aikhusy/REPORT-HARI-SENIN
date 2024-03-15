<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Api\PegawaiController;

Route::prefix('pegawai')->group(function () {

    Route::get('jenis_kelamin', [PegawaiController::class, 'countPegawaiByJenisKelamin']);
    
});
