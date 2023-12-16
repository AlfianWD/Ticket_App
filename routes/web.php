<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\NomorAntrianController;


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

Route::get('/resi', function(){
    return view('resi/resi');
});

Route::post('/simpan-nomor-antrian', [NomorAntrianController::class, 'saveNomorAntrian']);

