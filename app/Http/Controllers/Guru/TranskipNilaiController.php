<?php

namespace App\Http\Controllers\Guru;

use App\Http\Controllers\Controller;
use App\Models\Nilai;
use App\Models\Siswa;
use Illuminate\Http\Request;

class TranskipNilaiController extends Controller
{
    public function index(){
        $siswa = Siswa::all();
        $nilai = Nilai::all();
        return view('guru.transkipnilai.index', compact('siswa', 'nilai'));
    }
}