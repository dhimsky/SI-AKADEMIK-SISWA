<?php

namespace App\Http\Controllers\Siswa;

use App\Http\Controllers\Controller;
use App\Models\Absensi;
use Illuminate\Support\Facades\Auth;
use App\Models\Siswa;
use Illuminate\Http\Request;

class AbsensiController extends Controller
{
    public function index(){
        $kode_identitas = Auth::user()->kode_identitas;
        $siswa = Siswa::where('nis', $kode_identitas)->first();
        if ($siswa) {
            $absensi = Absensi::where('nis_id', $siswa->nis)->get();
        } else {
            $absensi = collect();
        }
        return view('siswa.absensi.index', compact('siswa', 'absensi'));
    }
}