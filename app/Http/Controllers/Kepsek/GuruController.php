<?php

namespace App\Http\Controllers\Kepsek;

use App\Http\Controllers\Controller;
use App\Models\Guru;
use Illuminate\Http\Request;

class GuruController extends Controller
{
    public function index(){
        $guru = Guru::all();
        return view('kepsek.guru.index', compact('guru'));
    }
}
