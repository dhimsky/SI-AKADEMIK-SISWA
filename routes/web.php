<?php

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

//AUTH
Route::get('/login', function () {
    return view('auth.login');
});

//STAFF TU
Route::get('/dashboardstafftu', function () {
    return view('stafftu.dashboard.index');
});
Route::get('/role', function () {
    return view('stafftu.role.index');
});
Route::get('/akun', function () {
    return view('stafftu.akun.index');
});
Route::get('/jurusan', function () {
    return view('stafftu.jurusan.index');
});

//SISWA


//WALI KELAS


//GURU MAPEL