<?php

namespace App\Http\Controllers\Export;

use App\Http\Controllers\Controller;
use App\Models\Siswa;
use App\Models\User;
use Illuminate\Http\Request;
use Barryvdh\DomPDF\Facade\Pdf;
use Illuminate\Support\Facades\DB;

class TranskipPdfController extends Controller
{
    public function generatePdf($id)
    {
        $siswa = Siswa::findOrFail($id);
        $kepsek = User::where('role_id', 4)->first();
        $mapelumum = DB::table('mapel')
        ->leftJoin('nilai', function($join) use ($id) {
            $join->on('mapel.kode_mapel', '=', 'nilai.mapel_kode')
            ->where('nilai.nis_id', '=', $id);
        })
        ->whereNull('mapel.jurusan_kode')
        ->select('mapel.nama_mapel', 'nilai.nilai_akhir', 'nilai.semester', 'nilai.psaj')
        ->get()
        ->groupBy('nama_mapel');
        
        $mapelkejuruan = DB::table('mapel')
        ->leftJoin('nilai', function($join) use ($id) {
            $join->on('mapel.kode_mapel', '=', 'nilai.mapel_kode')
                ->where('nilai.nis_id', '=', $id);
        })
        ->join('siswa', 'siswa.nis', '=', 'nilai.nis_id')
        ->join('kelas', 'kelas.nama_kelas', '=', 'siswa.kelas_id')
        ->whereColumn('mapel.jurusan_kode', 'kelas.jurusan_kode')
        ->select('mapel.nama_mapel', 'nilai.nilai_akhir', 'nilai.semester', 'nilai.psaj')
        ->get()
        ->groupBy('nama_mapel');

        $totalNilaiSemester = 0;
        $totalSemester = 0;
        foreach ($mapelumum as $mapel) {
            foreach ($mapel as $nilai) {
                if ($nilai->nilai_akhir !== null) {
                    $totalNilaiSemester += $nilai->nilai_akhir;
                    $totalSemester++;
                }
            }
        }
        foreach ($mapelkejuruan as $mapel) {
            foreach ($mapel as $nilai) {
                if ($nilai->nilai_akhir !== null) {
                    $totalNilaiSemester += $nilai->nilai_akhir;
                    $totalSemester++;
                }
            }
        }
        $rataRataNilaiSemester = $totalSemester > 0 ? $totalNilaiSemester / $totalSemester : 0;
    
        $totalNilaiPSAJ = 0;
        $totalPSAJ = 0;
        foreach ($mapelkejuruan as $mapel) {
            foreach ($mapel as $nilai) {
                if (isset($nilai->psaj) && $nilai->psaj !== null) {
                    $totalNilaiPSAJ += $nilai->psaj;
                    $totalPSAJ++;
                }
            }
        }
        $rataRataNilaiPSAJ = $totalPSAJ > 0 ? $totalNilaiPSAJ / $totalPSAJ : 0;

        $pdf = PDF::loadView('admin.transkipnilai.transkipnilai', compact('kepsek', 'siswa', 'mapelumum', 'mapelkejuruan', 'rataRataNilaiSemester', 'rataRataNilaiPSAJ'));
        return $pdf->stream('transkip_nilai.pdf');
    }
}