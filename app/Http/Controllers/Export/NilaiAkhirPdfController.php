<?php

namespace App\Http\Controllers\Export;

use App\Http\Controllers\Controller;
use App\Models\Siswa;
use Illuminate\Http\Request;
use Barryvdh\DomPDF\Facade\Pdf;

class NilaiAkhirPdfController extends Controller
{
    public function generatePdf()
    {
        // Fetch data siswa based on ID
        // $siswa = Siswa::findOrFail($id);

        // Prepare data for the view
        // $data = [
        //     'nama_siswa' => $siswa->nama_siswa,
        //     'nis' => $siswa->nis,
        //     'kelas' => $siswa->kelas->nama_kelas,
        //     'semester' => $siswa->semester,
        //     'sekolah' => 'SMK Negeri 1 Cilacap',
        //     'tahun_pelajaran' => $siswa->tahunpelajaran->tahun_pelajaran,
        //     'nilai' => [
        //         ['mata_pelajaran' => 'Pendidikan Agama dan Budi Pekerti', 'nilai' => 86],
        //         ['mata_pelajaran' => 'Pendidikan Pancasila', 'nilai' => 88],
        //         ['mata_pelajaran' => 'Bahasa Indonesia', 'nilai' => 90],
        //         ['mata_pelajaran' => 'Matematika', 'nilai' => 75],
        //         ['mata_pelajaran' => 'Pendidikan Jasmani, Olahraga dan Kesehatan', 'nilai' => 78],
        //         ['mata_pelajaran' => 'Bahasa Inggris', 'nilai' => 87],
        //         ['mata_pelajaran' => 'Simulasi dan Komunikasi Digital', 'nilai' => 95],
        //         ['mata_pelajaran' => 'Ekonomi Bisnis', 'nilai' => 89],
        //         ['mata_pelajaran' => 'Perencanaan Bisnis', 'nilai' => 85],
        //         ['mata_pelajaran' => 'Proyek Kreatif dan Kewirausahaan', 'nilai' => 78],
        //         ['mata_pelajaran' => 'Seni Budaya', 'nilai' => 81],
        //     ],
        //     'kehadiran' => [
        //         'sakit' => 1,
        //         'izin' => 2,
        //         'tanpa_keterangan' => 0,
        //     ],
        //     'wali_kelas' => [
        //         'nama' => 'Suriyatin Mukaromah, S.Pd',
        //         'nip' => '21342492424'
        //     ],
        //     'kepala_sekolah' => [
        //         'nama' => 'Tanpa Suryanto, S.Pd, M.Pd',
        //         'nip' => '21342469424'
        //     ]
        // ];

        // Generate PDF
        // $pdf = PDF::loadView('admin.nilai.nilaiakhir', compact('data'));
        $pdf = PDF::loadView('admin.nilai.nilaiakhir');
        return $pdf->stream('penilaian_siswa.pdf');
    }
}