<?php

namespace App\Http\Controllers\Export;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Barryvdh\DomPDF\Facade\Pdf;

class TranskipPdfController extends Controller
{
    public function generatePdf()
    {
        $pdf = PDF::loadView('admin.transkipnilai.transkipnilai');
        return $pdf->stream('transkip_nilai.pdf');
    }
}