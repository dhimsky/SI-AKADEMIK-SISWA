<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Angkatan;
use App\Models\Jurusan;
use App\Models\Kelas;
use App\Models\Siswa;
use App\Models\TahunPelajaran;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class SiswaController extends Controller
{
    public function index()
    {
        $kelas = Kelas::all();
        $siswas = Siswa::where('status_siswa', 'Aktif')->get();
        $nonsiswas = Siswa::where('status_siswa', 'Tidak Aktif')->get();
        $angkatans = Angkatan::all();
        $tahunpelajaran = TahunPelajaran::all();
        return view('admin.siswa.index', compact('kelas', 'siswas', 'nonsiswas', 'angkatans', 'tahunpelajaran'));
    }

    public function store_siswa(Request $request)
    {
        $validator = Validator::make($request->all(), Siswa::$rules, Siswa::$messages);
        if ($validator->fails()) {
            return redirect()->back()
                ->withErrors($validator)
                ->withInput();
        }

        $siswa = new Siswa();
        $siswa->nisn = $request->nisn;
        $siswa->nama_siswa = $request->nama_siswa;
        $siswa->kelas_id = $request->kelas_id;
        $siswa->angkatan_id = $request->angkatan_id;
        $siswa->tahunpelajaran_id = $request->tahunpelajaran_id;
        $siswa->status_siswa = $request->status_siswa;
        
        $siswa->save();

        return redirect()->back()->with('success', 'Siswa berhasil ditambahkan');
    }
}