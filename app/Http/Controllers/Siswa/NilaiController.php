<?php

namespace App\Http\Controllers\Siswa;

use App\Http\Controllers\Controller;
use App\Models\Nilai;
use App\Models\User;
use Illuminate\Support\Facades\Auth;
use App\Models\Siswa;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class NilaiController extends Controller
{
    public function nilai_akhir(){
        $kode_identitas = Auth::user()->kode_identitas;
        $siswa = Siswa::where('nis', $kode_identitas)->first();

        if ($siswa) {
            $nilai = Nilai::where('nis_id', $siswa->nis)->get();
        } else {
            $nilai = collect();
        }

        return view('siswa.nilai.nilai-akhir', compact('nilai', 'siswa'));
    }
    public function transkip_nilai(){
        $kode_identitas = Auth::user()->kode_identitas;
        $siswa = Siswa::where('nis', $kode_identitas)->first();

        $mapelumum = DB::table('mapel')
        ->leftJoin('nilai', function($join) use ($kode_identitas) {
            $join->on('mapel.kode_mapel', '=', 'nilai.mapel_kode')
            ->where('nilai.nis_id', '=', $kode_identitas);
        })
        ->whereNull('mapel.jurusan_kode')
        ->select('mapel.nama_mapel', 'nilai.nilai_akhir', 'nilai.semester', 'nilai.psaj')
        ->get()
        ->groupBy('nama_mapel');
        
        $mapelkejuruan = DB::table('mapel')
        ->leftJoin('nilai', function($join) use ($kode_identitas) {
            $join->on('mapel.kode_mapel', '=', 'nilai.mapel_kode')
                ->where('nilai.nis_id', '=', $kode_identitas);
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
    
        // Hitung rata-rata nilai PSAJ
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
        return view('siswa.nilai.transkipnilai', compact('siswa', 'mapelumum', 'mapelkejuruan', 'rataRataNilaiSemester', 'rataRataNilaiPSAJ'));
    }
}