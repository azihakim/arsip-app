<?php

use App\Http\Controllers\DokumenController;
use App\Http\Controllers\PegawaiController;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/', function () {
    return view('master');
});
Route::get('/data', function () {
    return view('data.data');
});
Route::get('/p', function () {
    return view('pegawai.addPegawai');
});

// Pegawai
Route::resource('/pegawai', PegawaiController::class);

// Dokumen
Route::resource('/dokumen', DokumenController::class);


