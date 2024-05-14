<?php

use App\Http\Controllers\Admin\DashboardController as AdminDashboardController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\Siswa\DashboardController as SiswaDashboardController;
use App\Http\Controllers\Walikelas\DashboardController as WalikelasDashboardController;

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
Route::delete('/logoutsession', [AuthController::class, 'logout'])->name('actionlogout');



Route::middleware(['auth'])->group(function () {
    // Route prefix untuk admin
    Route::prefix('admin')->middleware('CekUserLogin:1')->group(function () {
        Route::get('dashboard', [AdminDashboardController::class, 'index'])->name('admin.dashboard');
    });

    // Route prefix untuk walikelas
    Route::prefix('walikelas')->middleware('CekUserLogin:2')->group(function () {
        Route::get('dashboard', [WalikelasDashboardController::class, 'index'])->name('walikelas.dashboard');
    });

    //Route prefix untuk siswa
    Route::prefix('siswa')->middleware('CekUserLogin:3')->group(function () {
        Route::get('dashboard', [SiswaDashboardController::class, 'index'])->name('siswa.dashboard');
    });
});