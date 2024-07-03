<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Guru;
use App\Models\Jurusan;
use App\Models\Kelas;
use App\Models\Siswa;
use Illuminate\Http\Request;

class DashboardController extends Controller
{
    public function index(){
        $jmlsiswa = Siswa::count();
        $jmlguru = Guru::count();
        $jmljurusan = Jurusan::count();
        $jmlkelas = Kelas::count();
        return view('admin.dashboard.index', compact('jmlsiswa', 'jmlguru', 'jmljurusan', 'jmlkelas'));
    }
}