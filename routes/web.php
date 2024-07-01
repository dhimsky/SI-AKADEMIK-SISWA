<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;
//UMUM
use App\Http\Controllers\ProfileController;
//ADMIN
use App\Http\Controllers\Admin\DashboardController as AdminDashboardController;
use App\Http\Controllers\Admin\AkunController as AdminAkunController;
use App\Http\Controllers\Admin\JurusanController as AdminJurusanController;
use App\Http\Controllers\Admin\RoleController as AdminRoleController;
use App\Http\Controllers\Admin\RombelController as AdminRombelController;
use App\Http\Controllers\Admin\KelasController as AdminKelasController;
use App\Http\Controllers\Admin\AngkatanController as AdminAngkatanController;
use App\Http\Controllers\Admin\MapelController as AdminMapelController;
use App\Http\Controllers\Admin\GuruController as AdminGuruController;
use App\Http\Controllers\Admin\SiswaController as AdminSiswaController;
use App\Http\Controllers\Admin\NilaiController as AdminNilaiController;
use App\Http\Controllers\Admin\TahunPelajaranController as AdminTahunPelajaranController;
use App\Http\Controllers\Admin\AbsensiController as AdminAbsensiController;
use App\Http\Controllers\Admin\TranskipNilaiController as AdminTranskipNilaiController;
use App\Http\Controllers\Export\NilaiAkhirPdfController as NilaiAkhirPdfController;
use App\Http\Controllers\Export\TranskipPdfController as TranskipPdfController;
use App\Http\Controllers\Export\AbsensiPdfController as AbsensiPdfController;

//GURU
use App\Http\Controllers\Guru\DashboardController as GuruDashboardController;
use App\Http\Controllers\Guru\NilaiController as GuruNilaiController;
use App\Http\Controllers\Guru\AbsensiController as GuruAbsensiController;
//SISWA
use App\Http\Controllers\Siswa\DashboardController as SiswaDashboardController;
use App\Http\Controllers\Siswa\NilaiController as SiswaNilaiController;
use App\Http\Controllers\Siswa\AbsensiController as SiswaAbsensiController;

//KEPSEK
use App\Http\Controllers\Kepsek\DashboardController as KepsekDashboardController;
use App\Http\Controllers\Kepsek\GuruController as KepsekGuruController;
use App\Http\Controllers\Kepsek\NilaiController as KepsekNilaiController;
use App\Http\Controllers\Kepsek\SiswaController as KepsekSiswaController;


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
    // ============================== PROFILE ===========================================
    Route::get('profile', [ProfileController::class, 'index'])->name('profile');
    Route::put('update-profile', [ProfileController::class, 'update'])->name('update-profile');
    Route::post('update-password', [ProfileController::class, 'update_password'])->name('update-password');
    // Route prefix untuk admin
    Route::prefix('admin')->name('admin.')->middleware('CekUserLogin:1')->group(function () {
        // ============================== DASHBOARD ===========================================
        Route::get('dashboard', [AdminDashboardController::class, 'index'])->name('dashboard');
        // ============================== AKUN ===========================================
        Route::get('akun', [AdminAkunController::class, 'index'])->name('akun');
        Route::post('tambah-akun', [AdminAkunController::class, 'store_akun'])->name('store-akun');
        Route::put('update-akun/{id}', [AdminAkunController::class, 'update_akun'])->name('update-akun');
        Route::delete('delete-akun/{id}', [AdminAkunController::class, 'delete_akun'])->name('delete-akun');
        // ============================== JURUSAN ===========================================
        Route::get('jurusan', [AdminJurusanController::class, 'index'])->name('jurusan');
        Route::post('tambah-jurusan', [AdminJurusanController::class, 'store_jurusan'])->name('store-jurusan');
        Route::put('update-jurusan/{kode_jurusan}', [AdminJurusanController::class, 'update_jurusan'])->name('update-jurusan');
        Route::delete('delete-jurusan/{kode_jurusan}', [AdminJurusanController::class, 'delete_jurusan'])->name('delete-jurusan');
        // ============================== ROLE ===========================================
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
        // ============================== GURU ===========================================
        Route::get('guru', [AdminGuruController::class, 'index'])->name('guru');
        Route::post('tambah-guru', [AdminGuruController::class, 'store_guru'])->name('store-guru');
        Route::put('update-guru/{id}', [AdminGuruController::class, 'update_guru'])->name('update-guru');
        Route::delete('delete-guru/{id}', [AdminGuruController::class, 'delete_guru'])->name('delete-guru');
        // ============================== SISWA ===========================================
        Route::get('siswa', [AdminSiswaController::class, 'index'])->name('siswa');
        Route::get('nonsiswa', [AdminSiswaController::class, 'nonsiswa'])->name('nonsiswa');
        Route::post('tambah-siswa', [AdminSiswaController::class, 'store_siswa'])->name('store-siswa');
        Route::put('update-siswa/{id}', [AdminSiswaController::class, 'update_siswa'])->name('update-siswa');
        Route::delete('delete-siswa/{id}', [AdminSiswaController::class, 'delete_siswa'])->name('delete-siswa');
        Route::post('import', [AdminSiswaController::class, 'import'])->name('import');
        // ============================== NILAI ===========================================
        Route::get('nilai', [AdminNilaiController::class, 'index'])->name('nilai');
        // Route::get('tambah-nilai/{id}', [AdminNilaiController::class, 'tambah_nilai'])->name('tambah-nilai');
        Route::get('{id}/nilai', [AdminNilaiController::class, 'show'])->name('siswa.nilai');
        Route::post('store-nilai', [AdminNilaiController::class, 'store_nilai'])->name('store-nilai');
        Route::put('update-nilai/{id}', [AdminNilaiController::class, 'update_nilai'])->name('update-nilai');
        Route::delete('delete-nilai/{id}', [AdminNilaiController::class, 'delete_nilai'])->name('delete-nilai');
        Route::put('publish-nilai/{id}', [AdminNilaiController::class, 'publish_nilai'])->name('publish-nilai');
        // Route::get('/siswa/{id}/export-pdf', [NilaiAkhirPdfController::class, 'generatePdf'])->name('export_pdf');
        Route::post('/siswa/{id}/nilaiakhir-pdf', [NilaiAkhirPdfController::class, 'generatePdf'])->name('nilaiakhir_pdf');
        // ============================== TAHUN PELAJARAN ===========================================
        Route::get('tahunpelajaran', [AdminTahunPelajaranController::class, 'index'])->name('tahunpelajaran');
        Route::post('store-tahunpelajaran', [AdminTahunPelajaranController::class, 'store'])->name('store-tahunpelajaran');
        Route::put('update-tahunpelajaran/{id}', [AdminTahunPelajaranController::class, 'update'])->name('update-tahunpelajaran');
        Route::delete('delete-tahunpelajaran/{id}', [AdminTahunPelajaranController::class, 'delete'])->name('delete-tahunpelajaran');
        // ============================== ABSENSI ===========================================
        Route::get('absensi', [AdminAbsensiController::class, 'index'])->name('absensi');
        Route::get('absensi-perkelas/{kelas_id}', [AdminAbsensiController::class, 'show'])->name('absensi-perkelas');
        Route::post('store-absensi-perkelas', [AdminAbsensiController::class, 'store'])->name('store-absensi-perkelas');
        Route::post('/siswa/absensi/{kelas_id}/pdf', [AbsensiPdfController::class, 'generatePdf'])->name('absensi-pdf');
        // ============================== TRANSKRIP NILAI ===========================================
        Route::get('transkipnilai', [AdminTranskipNilaiController::class, 'index'])->name('transkipnilai');
        Route::get('/siswa/{id}/transkipnilai-pdf', [TranskipPdfController::class, 'generatePdf'])->name('transkip_pdf');
    });
    
    // Route prefix untuk walikelas
    Route::prefix('guru')->name('guru.')->middleware('CekUserLogin:2')->group(function () {
        // ============================== DASHBOARD ===========================================
        Route::get('dashboard', [GuruDashboardController::class, 'index'])->name('dashboard');
        // ============================== NILAI ===========================================
        Route::get('nilai', [GuruNilaiController::class, 'index'])->name('nilai');
        Route::get('siswa-perkelas', [GuruNilaiController::class, 'siswa_perkelas'])->name('siswa-perkelas');
        Route::get('{id}/nilai', [GuruNilaiController::class, 'show'])->name('siswa.nilai');
        // ============================== DASHBOARD ===========================================
        Route::get('absensi', [GuruAbsensiController::class, 'index'])->name('absensi');
        Route::get('absensi-perkelas', [GuruAbsensiController::class, 'show'])->name('absensi-perkelas');
    });
    
    //Route prefix untuk siswa
    Route::prefix('siswa')->name('siswa.')->middleware('CekUserLogin:3')->group(function () {
        // ============================== DASHBOARD ===========================================
        Route::get('dashboard', [SiswaDashboardController::class, 'index'])->name('dashboard');
        // ============================== NILAI ===========================================
        Route::get('nilai-akhir', [SiswaNilaiController::class, 'nilai_akhir'])->name('nilai-akhir');
        // ============================== ABSENSI ===========================================
        Route::get('absensi', [SiswaAbsensiController::class, 'index'])->name('absensi');
        // ============================== TRANKIP NILAI ===========================================
        Route::get('transkip-nilai', [SiswaNilaiController::class, 'transkip_nilai'])->name('transkip-nilai');
        Route::get('/{id}/transkipnilai-pdf', [TranskipPdfController::class, 'generatePdf'])->name('transkip_pdf');
    });

    //Route prefix untuk kepsek
    Route::prefix('kepsek')->name('kepsek.')->middleware('CekUserLogin:4')->group(function () {
        // ============================== DASHBOARD ===========================================
        Route::get('dashboard', [KepsekDashboardController::class, 'index'])->name('dashboard');
        // ============================== GURU ===========================================
        Route::get('guru', [KepsekGuruController::class, 'index'])->name('guru');
        // ============================== SISWA ===========================================
        Route::get('siswa', [KepsekSiswaController::class, 'index'])->name('siswa');
        Route::get('nonsiswa', [KepsekSiswaController::class, 'nonsiswa'])->name('nonsiswa');
        // ============================== NILAI ===========================================
        Route::get('nilai', [KepsekNilaiController::class, 'index'])->name('nilai');
    });
});