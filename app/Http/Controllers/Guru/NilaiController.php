<?php

namespace App\Http\Controllers\Guru;

use App\Http\Controllers\Controller;
use App\Models\Mapel;
use App\Models\Nilai;
use App\Models\Siswa;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;

class NilaiController extends Controller
{
    public function index(){
        $siswa = Siswa::all();
        $nilai = Nilai::all();
        return view('guru.nilai.index', compact('siswa', 'nilai'));
    }
    public function tambah_nilai(){
        $siswa = Siswa::all();
        $nilai = Nilai::all();
        $guru = Auth::user()->guru;
        $mapel = Mapel::where('kode_mapel', $guru->mapel_kode)->get();
        return view('guru.nilai.tambah', compact('siswa', 'nilai', 'mapel'));
    }
}