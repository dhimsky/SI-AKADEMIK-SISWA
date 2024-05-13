<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\DashboardController;

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


//STAFF TU
// Route::get('/dashboardstafftu', function () {
//     return view('stafftu.dashboard.index');
// });
Route::get('/role', function () {
    return view('stafftu.role.index');
});
Route::get('/akun', function () {
    return view('stafftu.akun.index');
});
Route::get('/jurusan', function () {
    return view('stafftu.jurusan.index');
});

//Authentication
Route::get('/', [AuthController::class, 'index'])->name('/');
Route::post('/loginsession', [AuthController::class, 'login']);

Route::middleware(['auth'])->group(function () {
    Route::middleware('CekUserLogin:1')->group(function () {
        Route::get('dashboard', [DashboardController::class, 'index'])->name('dashboard');
    });
    Route::middleware('CekUserLogin:2')->group(function () {
    });
});


//Stafftu


// //SISWA

//GURU MAPEL