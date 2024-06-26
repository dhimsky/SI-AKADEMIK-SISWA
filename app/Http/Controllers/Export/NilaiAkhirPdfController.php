<?php

namespace App\Http\Controllers\Export;

use App\Http\Controllers\Controller;
use App\Models\Mapel;
use App\Models\Siswa;
use App\Models\User;
use Illuminate\Http\Request;
use Barryvdh\DomPDF\Facade\Pdf;
use Illuminate\Support\Facades\DB;

class NilaiAkhirPdfController extends Controller
{
    public function generatePdf($id)
    {
        $siswa = Siswa::findOrFail($id);
        $namaWaliKelas = $siswa->kelas->guru->first();
        $mapel = Mapel::all();
        $kepsek = User::where('role_id', 4)->first();
        $mapelumum = DB::table('mapel')
        ->leftJoin('nilai', function($join) use ($id) {
            $join->on('mapel.kode_mapel', '=', 'nilai.mapel_kode')
            ->where('nilai.nis_id', '=', $id);
        })
        ->whereNull('mapel.jurusan_kode')
        ->select('mapel.nama_mapel', 'nilai.nilai_akhir')
        ->get();

        $mapelkejuruan = DB::table('mapel')
            ->leftJoin('nilai', function($join) use ($id) {
                $join->on('mapel.kode_mapel', '=', 'nilai.mapel_kode')
                    ->where('nilai.nis_id', '=', $id);
            })
            ->join('siswa', 'siswa.nis', '=', 'nilai.nis_id')
            ->join('kelas', 'kelas.nama_kelas', '=', 'siswa.kelas_id')
            ->whereColumn('mapel.jurusan_kode', 'kelas.jurusan_kode')
            ->select('mapel.nama_mapel', 'nilai.nilai_akhir')
            ->get();

        $pdf = PDF::loadView('admin.nilai.nilaiakhir', compact('siswa', 'mapelumum', 'mapelkejuruan', 'kepsek', 'namaWaliKelas'));
        return $pdf->stream('penilaian_siswa.pdf');
    }
}