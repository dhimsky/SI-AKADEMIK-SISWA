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
    public function generatePdf(Request $request, $id)
    {
        $siswa = Siswa::findOrFail($id);
        $namaWaliKelas = $siswa->kelas->guru->first();
        $mapel = Mapel::all();
        $kepsek = User::where('role_id', 4)->first();
        $semester = $request->semester;

        if ($semester == NULL) {
            // dd('asd');
            return redirect()->back()->with('error', 'Pilih kategori semester');
        }else {
            $mapelumum = DB::table('mapel')
            ->leftJoin('nilai', function($join) use ($id, $semester) {
                $join->on('mapel.kode_mapel', '=', 'nilai.mapel_kode')
                    ->where('nilai.nis_id', '=', $id)
                    ->where('nilai.semester', '=', $semester);
            })
            ->leftJoin('siswa', 'siswa.nis', '=', 'nilai.nis_id')
            ->whereNull('mapel.jurusan_kode')
            ->where(function($query) use ($semester) {
                $query->where('siswa.semester', '=', $semester)
                    ->orWhereNull('siswa.semester');
            })
            ->select('mapel.nama_mapel', 'nilai.nilai_akhir')
            ->get();
    
            $queryWithNilai = DB::table('mapel')
            ->leftJoin('nilai', function($join) use ($id) {
                $join->on('mapel.kode_mapel', '=', 'nilai.mapel_kode')
                    ->where('nilai.nis_id', '=', $id);
            })
            ->join('siswa', 'siswa.nis', '=', 'nilai.nis_id')
            ->join('kelas', 'kelas.nama_kelas', '=', 'siswa.kelas_id')
            ->where('mapel.jurusan_kode', '=', $siswa->kelas->jurusan_kode)
            ->select('mapel.nama_mapel', 'nilai.nilai_akhir');
    
            $queryWithoutNilai = DB::table('mapel')
            ->leftJoin('nilai', function($join) use ($id) {
                $join->on('mapel.kode_mapel', '=', 'nilai.mapel_kode')
                    ->where('nilai.nis_id', '=', $id);
            })
            ->whereNull('nilai.nilai_akhir') // Filter untuk nilai yang null (mapel tanpa nilai)
            ->where('mapel.jurusan_kode', '=', $siswa->kelas->jurusan_kode)
            ->select('mapel.nama_mapel', DB::raw('NULL AS nilai_akhir'));
    
            $mapelkejuruan = DB::table(DB::raw("({$queryWithNilai->toSql()}) as mapel_with_nilai"))
            ->mergeBindings($queryWithNilai)
            ->union($queryWithoutNilai)
            ->get();
        }


        $pdf = PDF::loadView('admin.nilai.nilaiakhir', compact('siswa', 'mapelumum', 'mapelkejuruan', 'kepsek', 'namaWaliKelas'));
        return $pdf->stream('penilaian_siswa.pdf');

        // $mapelkejuruan = DB::table('mapel')
        //     ->leftJoin('nilai', function($join) use ($id) {
        //         $join->on('mapel.kode_mapel', '=', 'nilai.mapel_kode')
        //             ->where('nilai.nis_id', '=', $id);
        //     })
        //     ->join('siswa', 'siswa.nis', '=', 'nilai.nis_id')
        //     ->join('kelas', 'kelas.nama_kelas', '=', 'siswa.kelas_id')
        //     ->whereColumn('mapel.jurusan_kode', 'kelas.jurusan_kode')
        //     ->select('mapel.nama_mapel', 'nilai.nilai_akhir')
        //     ->get();
    }
}