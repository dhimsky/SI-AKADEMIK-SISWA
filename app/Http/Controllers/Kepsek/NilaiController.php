<?php

namespace App\Http\Controllers\Kepsek;

use App\Http\Controllers\Controller;
use App\Models\Kelas;
use App\Models\Mapel;
use App\Models\Nilai;
use App\Models\Siswa;
use Illuminate\Http\Request;

class NilaiController extends Controller
{
    public function index(){
        $kelas = Kelas::all();
        return view('kepsek.nilai.index', compact('kelas'));
    }

    public function siswa_perkelas(){
        $siswa = Siswa::all();
        return view('kepsek.nilai.siswa-perkelas', compact('siswa'));
    }

    public function show($id)
    {
        $idSiswa = $id;
        $siswa = Siswa::with(['nilai' => function($query) {
            $query->select('nis_id', 'nilai_akhir', 'ulangan_harian', 'uts', 'uas', 'tahun_pelajaran', 'kelas');
        }, 'kelas'])->findOrFail($id);

        $nilai = Nilai::where('nis_id', $siswa->nis)->get();
        $mapel = Mapel::all();

        return view('kepsek.nilai.detail-nilai-siswa', compact('siswa', 'nilai', 'mapel', 'idSiswa'));
    }
}