<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Kelas;
use App\Models\Siswa;
use Illuminate\Http\Request;

class AbsensiController extends Controller
{
    public function index(){
        $siswa = Siswa::all();
        $kelas = Kelas::all();
        return view('admin.absensi.index', compact('siswa', 'kelas'));
    }
}