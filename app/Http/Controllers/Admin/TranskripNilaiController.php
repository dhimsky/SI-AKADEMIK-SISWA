<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Nilai;
use App\Models\Siswa;
use Illuminate\Http\Request;

class TranskripNilaiController extends Controller
{
    public function index(){
        $siswa = Siswa::all();
        $nilai = Nilai::all();
        return view('admin.transkripnilai.index', compact('siswa', 'nilai'));
    }
}
