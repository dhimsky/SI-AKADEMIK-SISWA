<?php

namespace App\Http\Controllers\Guru;

use App\Http\Controllers\Controller;
use App\Models\Siswa;
use Illuminate\Http\Request;

class DashboardController extends Controller
{
    public function index(){
        $siswa = Siswa::count();
        return view('guru.dashboard.index', compact('siswa'));
    }
}