<?php

namespace App\Http\Controllers\Kepsek;

use App\Http\Controllers\Controller;
use App\Models\Angkatan;
use App\Models\Kelas;
use App\Models\Siswa;
use Illuminate\Http\Request;

class SiswaController extends Controller
{
    public function index(){
        $kelas = Kelas::all();
        $angkatan = Angkatan::all();
        $siswa = Siswa::all();
        return view('kepsek.siswa.index', compact('kelas', 'angkatan', 'siswa'));
    }
}