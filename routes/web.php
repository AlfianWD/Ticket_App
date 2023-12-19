<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\NomorAntrianController;
use App\Http\Controllers\LoginController;


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
    Route::get('/dashboard', function () {
        return view('resi/dashboard');
    })->name('dashboard');

    Route::post('/logout', 'LoginController@logout')->name('logout');
});

Route::middleware(['check.nomor.antrian'])->group(function () {
    Route::get('/resi', 'ResiController@index')->name('resi');
});