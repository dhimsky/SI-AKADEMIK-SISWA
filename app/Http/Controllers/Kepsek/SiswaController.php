<?php

namespace App\Http\Controllers\Kepsek;

use App\Http\Controllers\Controller;
use App\Models\Angkatan;
use App\Models\Kelas;
use App\Models\Siswa;
use App\Models\TahunPelajaran;
use Illuminate\Http\Request;

class SiswaController extends Controller
{
    public function index(){
        $kelas = Kelas::all();
        $angkatan = Angkatan::all();
        $siswa = Siswa::where('status_siswa', 'Aktif')->get();
        return view('kepsek.siswa.index', compact('kelas', 'angkatan', 'siswa'));
    }

    public function nonsiswa()
    {
        $kelas = Kelas::all();
        $nonsiswas = Siswa::where('status_siswa', 'Tidak Aktif')->get();
        $angkatans = Angkatan::all();
        $tahunpelajaran = TahunPelajaran::all();
        return view('kepsek.siswa.tidak-aktif', compact('kelas', 'nonsiswas', 'angkatans', 'tahunpelajaran'));
    }
}