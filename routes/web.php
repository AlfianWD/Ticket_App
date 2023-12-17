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

Route::get('/resi', function(){
    return view('resi/resi');
});

Route::post('/simpan-nomor-antrian', [NomorAntrianController::class, 'saveNomorAntrian']);
// Route::post('/login', [LoginController::class, 'login']);

// Route::get('/login', [LoginController::class, 'showLoginForm'])->name('login');

Route::post('/login', [LoginController::class, 'login']);
Route::get('/login', [LoginController::class, 'showLoginForm'])->name('login');

Route::get('/dashboard', function () {
    if (auth()->check()) {
        return view('dashboard/dashboard');
    } else {
        return redirect('/login');
    }
})->middleware('auth')->name('dashboard');

// Route::middleware(['web', 'auth'])->group(function() {
//     Route::get('/dashboard', function() {
//         return view ('dashboard/dashboard');
//     })->name('dashboard');
// });


// Route::middleware(['auth'])->group(function () {
//     Route::get('/dashboard', function () {
//         return view('dashboard.dashboard');
//     })->name('dashboard');

//     Route::get('/logout', function () {
//         auth()->logout();
//         return redirect()->route('login');
//     })->name('logout');
// });