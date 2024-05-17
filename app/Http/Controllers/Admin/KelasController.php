<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Jurusan;
use App\Models\Kelas;
use App\Models\Rombel;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class KelasController extends Controller
{
    public function index(){

        $jurusan = Jurusan::all();
        $rombel = Rombel::all();
        $kelas = Kelas::all();
        
        return view('admin.kelas.index', compact('jurusan', 'rombel', 'kelas'));
    }

    public function store_kelas(Request $request)
    {
        $rules = [
            'tingkat' => 'required',
            'jurusan_kode' => 'required',
            'rombel_kode' => 'required',
        ];
        $messages = [
            'tingkat.required' => 'Tingkat tidak boleh kosong!',
            'jurusan_kode.required' => 'Kode Jurusan tidak boleh kosong!',
            'rombel_kode.required' => 'Nama Jurusan tidak boleh kosong!'
        ];

        $validator = Validator::make($request->all(), $rules, $messages);
        if ($validator->fails()) {
            return redirect()->back()
                    ->withErrors($validator)
                    ->withInput();
        }

        $kelas = new Kelas();
        $kelas->nama_kelas = $request->tingkat . '-' . $request->jurusan_kode . '-' . $request->rombel_kode;
        $kelas->tingkat = $request->tingkat;
        $kelas->jurusan_kode = $request->jurusan_kode;
        $kelas->rombel_kode = $request->rombel_kode;
        $kelas->save();

        return redirect()->back()->with('success', 'Kelas berhasil ditambahkan');
    }

    public function update_kelas(Request $request, $nama_kelas)
    {
        $rules = [
            'tingkat' => 'required',
            'jurusan_kode' => 'required',
            'rombel_kode' => 'required',
        ];
        $messages = [
            'tingkat.required' => 'Tingkat tidak boleh kosong!',
            'jurusan_kode.required' => 'Kode Jurusan tidak boleh kosong!',
            'rombel_kode.required' => 'Nama Jurusan tidak boleh kosong!'
        ];

        $validator = Validator::make($request->all(), $rules, $messages);
        if ($validator->fails()) {
            return redirect()->back()
                    ->withErrors($validator)
                    ->withInput();
        }

        $kelas = Kelas::findOrFail($nama_kelas);
        $kelas->nama_kelas = $request->tingkat . '-' . $request->jurusan_kode . '-' . $request->rombel_kode;
        $kelas->tingkat = $request->tingkat;
        $kelas->jurusan_kode = $request->jurusan_kode;
        $kelas->rombel_kode = $request->rombel_kode;
        $kelas->save();

        return redirect()->back()->with('success', 'Kelas berhasil diperbarui');
    }

    public function delete_kelas($nama_kelas)
    {
        $kelas = Kelas::findOrFail($nama_kelas);
        $kelas->delete();

        return redirect()->back()->with('success', 'Kelas berhasil dihapus');
    }
}