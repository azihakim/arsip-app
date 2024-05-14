<?php
use App\Http\Controllers\DataController;
use App\Http\Controllers\DokumenController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\PenggunaController;
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

// Dokumen

Route::resource('/dokumen', DokumenController::class);

Route::resource('data', DataController::class);

Route::get('/', [HomeController::class, 'index']);
Route::resource('home', HomeController::class);

Route::resource('pengguna', PenggunaController::class);