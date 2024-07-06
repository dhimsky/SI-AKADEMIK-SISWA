<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Jurusan;
use App\Models\Kelas;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\DB;

class JurusanController extends Controller
{
    public function index(){
        $jurusan = Jurusan::all();
        return view('admin.jurusan.index', compact('jurusan'));
    }

    public function store_jurusan(Request $request)
    {
        $rules = [
            'kode_jurusan' => 'required',
            'nama_jurusan' => 'required',
        ];
        $messages = [
            'kode_jurusan.required' => 'Kode Jurusan tidak boleh kosong!',
            'nama_jurusan.required' => 'Nama Jurusan tidak boleh kosong!'
        ];

        $validator = Validator::make($request->all(), $rules, $messages);
        if ($validator->fails()) {
            return redirect()->back()
                    ->withErrors($validator)
                    ->withInput();
        }

        $jurusan = new Jurusan;
        $jurusan->kode_jurusan = $request->kode_jurusan;
        $jurusan->nama_jurusan = $request->nama_jurusan;
        $jurusan->save();

        return redirect()->back()->with('success', 'Jurusan berhasil ditambahkan');
    }

    public function update_jurusan(Request $request, $kode_jurusan)
    {
        $rules = [
            'kode_jurusan' => 'required',
            'nama_jurusan' => 'required',
        ];
        $messages = [
            'kode_jurusan.required' => 'Kode Jurusan tidak boleh kosong!',
            'nama_jurusan.required' => 'Nama Jurusan tidak boleh kosong!'
        ];

        $validator = Validator::make($request->all(), $rules, $messages);
        if ($validator->fails()) {
            return redirect()->back()
                    ->withErrors($validator)
                    ->withInput();
        }

        $jurusan = Jurusan::findOrFail($kode_jurusan);
        $jurusan->kode_jurusan = $request->kode_jurusan;
        $jurusan->nama_jurusan = $request->nama_jurusan;
        $jurusan->save();

        return redirect()->back()->with('success', 'Jurusan berhasil diperbarui');
    }

    public function delete_jurusan($kode_jurusan)
    {
        $kelas = Kelas::where('jurusan_kode', $kode_jurusan)->first();
        
        if (!$kelas){
            $jurusan = Jurusan::find($kode_jurusan);
            $jurusan->delete();
            return redirect()->back()->with('success', 'Jurusan berhasil dihapus.');
        }else{
            return redirect()->back()->with('error','Tidak dapat menghapus!, Jurusan sedang digunakan pada tabel Kelas.');        
        }
    }
}