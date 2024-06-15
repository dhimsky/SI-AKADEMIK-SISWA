<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Mapel;
use Illuminate\Http\Request;
use App\Models\Nilai;

class NilaiController extends Controller
{
    public function index(){
        $nilai = Nilai::all();
        $mapel = Mapel::all();
        return view('admin.nilai.index', compact('nilai', 'mapel'));
    }
}