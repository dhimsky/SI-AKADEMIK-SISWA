<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Mapel;
use App\Models\Siswa;
use Illuminate\Http\Request;
use App\Models\Nilai;

class NilaiController extends Controller
{
    public function index(){
        $siswa = Siswa::all();
        $nilai = Nilai::all();
        $mapel = Mapel::all();
        return view('admin.nilai.index', compact('siswa', 'nilai', 'mapel'));
    }
    public function tambah_nilai(){
        $siswa = Siswa::all();
        $nilai = Nilai::all();
        $mapel = Mapel::all();
        return view('admin.nilai.tambah', compact('siswa', 'nilai', 'mapel'));
    }
    public function store_nilai(Request $request){

    }
}