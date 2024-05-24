<?php

namespace App\Http\Controllers\Walikelas;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class NilaiController extends Controller
{
    public function index(){
        return view('walikelas.nilai.index');
    }
}
