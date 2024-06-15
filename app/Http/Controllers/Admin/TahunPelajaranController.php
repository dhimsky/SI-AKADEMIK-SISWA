<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\TahunPelajaran;
use Illuminate\Http\Request;

class TahunPelajaranController extends Controller
{
    public function index(){
        $tahunpelajaran = TahunPelajaran::all();
        return view('admin.tahunpelajaran.index', compact('tahunpelajaran'));
    }
}