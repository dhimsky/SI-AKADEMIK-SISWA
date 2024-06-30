<?php

namespace App\Http\Controllers\Guru;

use App\Http\Controllers\Controller;
use App\Models\Kelas;
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
        $kelas = Kelas::all();
        return view('guru.nilai.index', compact('siswa', 'nilai', 'kelas'));
    }
    public function siswa_perkelas(){
        $siswa = Siswa::all();
        return view('guru.nilai.siswa-perkelas', compact('siswa'));
    }
    public function show($id)
    {
        // Mengambil data siswa beserta nilai-nilainya berdasarkan nis_id
        $idSiswa = $id;
        $siswa = Siswa::with(['nilai' => function($query) {
            $query->select('nis_id', 'nilai_akhir', 'ulangan_harian', 'uts', 'uas', 'tahun_pelajaran', 'kelas');
        }, 'kelas'])->findOrFail($id);

        // Mengambil nilai-nilai siswa yang sesuai dengan nis_id
        $nilai = Nilai::where('nis_id', $siswa->nis)->get();
        $mapel = Mapel::all();

        return view('guru.nilai.detail-nilai-siswa', compact('siswa', 'nilai', 'mapel', 'idSiswa'));
    }
}