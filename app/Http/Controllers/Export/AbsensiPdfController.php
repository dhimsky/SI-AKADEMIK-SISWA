<?php

namespace App\Http\Controllers\Export;

use App\Http\Controllers\Controller;
use App\Models\Absensi;
use App\Models\Kelas;
use Barryvdh\DomPDF\Facade\Pdf;
use Illuminate\Http\Request;
use Carbon\Carbon;

class AbsensiPdfController extends Controller
{
    public function generatePdf(Request $request, $kelas_id){
        
        $bulanTahun = Carbon::createFromFormat('Y-m', $request->tanggal_absensi);
        $absensi = Absensi::where('kelas', $kelas_id)
            ->whereYear('tanggal_absensi', $bulanTahun->year)
            ->whereMonth('tanggal_absensi', $bulanTahun->month)
            ->get();

        if ($absensi) {
            $atribut = Absensi::where('kelas', $kelas_id)->first();
            $semester = $atribut->semester;
    
            // Mengatur lokal ke bahasa Indonesia
            Carbon::setLocale('id');
    
            $date = $request->tanggal_absensi;
            $carbonDate = Carbon::parse($date);
    
            // Format tanggal dalam bahasa Indonesia
            setlocale(LC_TIME, 'id_ID');
            $bulan = $carbonDate->translatedFormat('F'); // Output: Juni
            // dd($bulan);
            // Ambil semua tanggal absensi untuk bulan yang bersangkutan
            $daysInMonth = $carbonDate->daysInMonth;
    
            $absensiData = [];
            foreach ($absensi as $a) {
                $day = date('d', strtotime($a->tanggal_absensi));
                $absensiData[$a->nis_id]['nama'] = $a->siswa->nama_siswa;
                $absensiData[$a->nis_id]['status'][$day] = $a->status_absensi;
            }
            
            $pdf = PDF::loadView('admin.absensi.absensi-pdf', compact('absensiData', 'kelas_id', 'semester', 'bulan', 'daysInMonth'))->setPaper('a4', 'landscape');
            return $pdf->stream('absensi_siswa.pdf');
        }else {
            return redirect()->back()->with('error', 'Tidak ada data');
        }
    }
}