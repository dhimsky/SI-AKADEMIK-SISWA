<?php

namespace App\Http\Controllers\Export;

use App\Http\Controllers\Controller;
use App\Models\Absensi;
use App\Models\Kelas;
use Barryvdh\DomPDF\Facade\Pdf;
use Illuminate\Http\Request;

class AbsensiPdfController extends Controller
{
    public function generatePdf(){
        $absensi = Absensi::all();
        $pdf = PDF::loadView('admin.absensi.absensi-pdf', compact('absensi'))->setPaper('a4', 'landscape');
        return $pdf->stream('absensi_siswa.pdf');
    }
}