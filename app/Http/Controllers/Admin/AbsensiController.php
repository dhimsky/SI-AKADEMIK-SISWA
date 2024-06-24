<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Siswa;
use Illuminate\Http\Request;

class AbsensiController extends Controller
{
    public function index(){
        $siswa = Siswa::all();
        return view('admin.absensi.index', compact('siswa'));
    }
}