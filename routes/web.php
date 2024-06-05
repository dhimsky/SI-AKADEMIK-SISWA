<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\Admin\DashboardController as AdminDashboardController;
use App\Http\Controllers\Admin\AkunController as AdminAkunController;
use App\Http\Controllers\Admin\JurusanController as AdminJurusanController;
use App\Http\Controllers\Admin\RoleController as AdminRoleController;
use App\Http\Controllers\Admin\RombelController as AdminRombelController;
use App\Http\Controllers\Admin\KelasController as AdminKelasController;
use App\Http\Controllers\Admin\AngkatanController as AdminAngkatanController;
use App\Http\Controllers\Admin\MapelController as AdminMapelController;
use App\Http\Controllers\Admin\WalikelasController as AdminWalikelasController;
use App\Http\Controllers\Admin\SiswaController as AdminSiswaController;

use App\Http\Controllers\Walikelas\DashboardController as WalikelasDashboardController;
use App\Http\Controllers\Walikelas\NilaiController as WalikelasNilaiController;
use App\Http\Controllers\Walikelas\AbsensiController as WalikelasAbsensiController;

use App\Http\Controllers\Siswa\DashboardController as SiswaDashboardController;


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
        // ============================== DASHBOARD ===========================================
        Route::get('dashboard', [AdminDashboardController::class, 'index'])->name('dashboard');
        // ============================== AKUN ===========================================
        Route::get('akun', [AdminAkunController::class, 'index'])->name('akun');
        Route::post('tambah-akun', [AdminAkunController::class, 'store_akun'])->name('store-akun');
        Route::put('update-akun/{id}', [AdminAkunController::class, 'update_akun'])->name('update-akun');
        Route::delete('delete-akun/{id}', [AdminAkunController::class, 'delete_akun'])->name('delete-akun');
        // ============================== ROLE ===========================================
        Route::get('jurusan', [AdminJurusanController::class, 'index'])->name('jurusan');
        Route::post('tambah-jurusan', [AdminJurusanController::class, 'store_jurusan'])->name('store-jurusan');
        Route::put('update-jurusan/{kode_jurusan}', [AdminJurusanController::class, 'update_jurusan'])->name('update-jurusan');
        Route::delete('delete-jurusan/{kode_jurusan}', [AdminJurusanController::class, 'delete_jurusan'])->name('delete-jurusan');
        // ============================== JURUSAN ===========================================
        Route::get('role', [AdminRoleController::class, 'index'])->name('role');
        Route::put('update-role/{id}', [AdminRoleController::class, 'update_role'])->name('update-role');
        // ============================== ROMBEL ===========================================
        Route::get('rombel', [AdminRombelController::class, 'index'])->name('rombel');
        Route::post('tambah-rombel', [AdminRombelController::class, 'store_rombel'])->name('store-rombel');
        Route::put('update-rombel/{kode_rombel}', [AdminRombelController::class, 'update_rombel'])->name('update-rombel');
        Route::delete('delete-rombel/{kode_rombel}', [AdminRombelController::class, 'delete_rombel'])->name('delete-rombel');
        // ============================== KELAS ===========================================
        Route::get('kelas', [AdminKelasController::class, 'index'])->name('kelas');
        Route::post('tambah-kelas', [AdminKelasController::class, 'store_kelas'])->name('store-kelas');
        Route::put('update-kelas/{nama_kelas}', [AdminKelasController::class, 'update_kelas'])->name('update-kelas');
        Route::delete('delete-kelas/{nama_kelas}', [AdminKelasController::class, 'delete_kelas'])->name('delete-kelas');
        // ============================== ANGKATAN ===========================================
        Route::get('angkatan', [AdminAngkatanController::class, 'index'])->name('angkatan');
        Route::post('tambah-angkatan', [AdminAngkatanController::class, 'store_angkatan'])->name('store-angkatan');
        Route::put('update-angkatan/{kode_angkatan}', [AdminAngkatanController::class, 'update_angkatan'])->name('update-angkatan');
        Route::delete('delete-angkatan/{kode_angkatan}', [AdminAngkatanController::class, 'delete_angkatan'])->name('delete-angkatan');
        // ============================== MAPEL ===========================================
        Route::get('mapel', [AdminMapelController::class, 'index'])->name('mapel');
        Route::post('tambah-mapel', [AdminMapelController::class, 'store_mapel'])->name('store-mapel');
        Route::put('update-mapel/{kode_mapel}', [AdminMapelController::class, 'update_mapel'])->name('update-mapel');
        Route::delete('delete-mapel/{kode_mapel}', [AdminMapelController::class, 'delete_mapel'])->name('delete-mapel');
        // ============================== WALIKELAS ===========================================
        Route::get('walikelas', [AdminWalikelasController::class, 'index'])->name('walikelas');
        Route::post('tambah-walikelas', [AdminWalikelasController::class, 'store_walikelas'])->name('store-walikelas');
        Route::put('update-walikelas/{id}', [AdminWalikelasController::class, 'update_walikelas'])->name('update-walikelas');
        Route::delete('delete-walikelas/{id}', [AdminWalikelasController::class, 'delete_walikelas'])->name('delete-walikelas');
        // ============================== SISWA ===========================================
        Route::get('siswa', [AdminSiswaController::class, 'index'])->name('siswa');
        Route::post('tambah-siswa', [AdminSiswaController::class, 'store_siswa'])->name('store-siswa');
    });
    
    // Route prefix untuk walikelas
    Route::prefix('walikelas')->name('walikelas.')->middleware('CekUserLogin:2')->group(function () {
        // ============================== DASHBOARD ===========================================
        Route::get('dashboard', [WalikelasDashboardController::class, 'index'])->name('dashboard');
        // ============================== NILAI ===========================================
        Route::get('nilai', [WalikelasNilaiController::class, 'index'])->name('nilai');
        // ============================== DASHBOARD ===========================================
        Route::get('absensi', [WalikelasAbsensiController::class, 'index'])->name('absensi');
    });
    
    //Route prefix untuk siswa
    Route::prefix('siswa')->name('siswa.')->middleware('CekUserLogin:3')->group(function () {
        // ============================== DASHBOARD ===========================================
        Route::get('dashboard', [SiswaDashboardController::class, 'index'])->name('dashboard');
    });
});