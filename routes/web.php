<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\NomorAntrianController;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\ResiController;


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
    return view('homepage');
}); 

Route::post('/simpan-nomor-antrian', [NomorAntrianController::class, 'saveNomorAntrian']);
    
Route::post('/login', [LoginController::class, 'login']);
Route::get('/login', [LoginController::class, 'showLoginForm'])->name('login');

Route::middleware(['auth'])->group(function () {
    Route::get('/dashboard', [NomorAntrianController::class, 'view']);
    Route::post('/panggil-antrian', [NomorAntrianController::class, 'saveDataNomorAntrian']);
    Route::post('/logout', [LoginController::class, 'logout'])->name('logout');
});

Route::middleware(['check.nomor.antrian'])->group(function () {
    Route::get('/resi', [ResiController::class, 'index'])->name('resi');
});
