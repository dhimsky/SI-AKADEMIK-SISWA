<?php

use App\Http\Controllers\Admin\DashboardController as AdminDashboardController;
use App\Http\Controllers\Admin\AkunController as AdminAkunController;
use App\Http\Controllers\Admin\JurusanController as AdminJurusanController;
use App\Http\Controllers\Admin\RoleController as AdminRoleController;
use App\Http\Controllers\Admin\RombelController as AdminRombelController;
use App\Http\Controllers\Admin\KelasController as AdminKelasController;
use App\Http\Controllers\Admin\AngkatanController as AdminAngkatanController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;
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



//Authentication
Route::get('/', [AuthController::class, 'index'])->name('/');
Route::post('/loginsession', [AuthController::class, 'login']);
Route::delete('/logoutsession', [AuthController::class, 'logout'])->name('actionlogout');



Route::middleware(['auth'])->group(function () {
    // Route prefix untuk admin
    Route::prefix('admin')->name('admin.')->middleware('CekUserLogin:1')->group(function () {
        Route::get('dashboard', [AdminDashboardController::class, 'index'])->name('dashboard');
        Route::get('akun', [AdminAkunController::class, 'index'])->name('akun');
        Route::get('jurusan', [AdminJurusanController::class, 'index'])->name('jurusan');
        Route::get('role', [AdminRoleController::class, 'index'])->name('role');
        Route::get('rombel', [AdminRombelController::class, 'index'])->name('rombel');
        Route::get('kelas', [AdminKelasController::class, 'index'])->name('kelas');
        Route::get('angkatan', [AdminAngkatanController::class, 'index'])->name('angkatan');
    });

    // Route prefix untuk walikelas
    Route::prefix('walikelas')->name('walikelas.')->middleware('CekUserLogin:2')->group(function () {
        Route::get('dashboard', [WalikelasDashboardController::class, 'index'])->name('dashboard');
    });

    //Route prefix untuk siswa
    Route::prefix('siswa')->name('siswa.')->middleware('CekUserLogin:3')->group(function () {
        Route::get('dashboard', [SiswaDashboardController::class, 'index'])->name('dashboard');
    });
});