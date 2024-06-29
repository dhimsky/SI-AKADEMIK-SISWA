<?php

namespace App\Http\Controllers\Guru;

use App\Http\Controllers\Controller;
use App\Models\Kelas;
use Illuminate\Http\Request;

class AbsensiController extends Controller
{
    public function index(){
        $kelas = Kelas::all();
        return view('guru.absensi.index', compact('kelas'));
    }
    public function show(){
        return view('guru.absensi.absensi-perkelas');
    }
}