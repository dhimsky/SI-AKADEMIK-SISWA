<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Mapel;
use App\Models\Siswa;
use Illuminate\Http\Request;
use App\Models\Nilai;
use Illuminate\Support\Facades\Validator;

class NilaiController extends Controller
{
    public function index(){
        $siswa = Siswa::all();
        $nilai = Nilai::all();
        $mapel = Mapel::all();
        return view('admin.nilai.index', compact('siswa', 'nilai', 'mapel'));
    }
    public function tambah_nilai(){
        $siswa = Siswa::all();
        $nilai = Nilai::all();
        $mapel = Mapel::all();
        return view('admin.nilai.tambah', compact('siswa', 'nilai', 'mapel'));
    }
    public function store_nilai(Request $request){
        $rules = [
            'nis_id' => 'required',
            'mapel_kode' => 'required',
            'value' => 'required',
        ];
        $messages = [
            'nis_id.required' => 'Nama Siswa tidak boleh kosong',
            'mapel_kode.required' => 'Nama Siswa tidak boleh kosong',
            'value.required' => 'Nama Siswa tidak boleh kosong',
        ];
        $validator = Validator::make($request->all(), $rules, $messages);
        if ($validator->fails()) {
            return redirect()->back()
                    ->withErrors($validator)
                    ->withInput();
        }

        $siswa = Siswa::findOrFail($request->nis_id);
        
        $nilai = new Nilai();
        $nilai->nis_id = $request->nis_id;
        $nilai->mapel_kode = $request->mapel_kode;
        $nilai->semester = $siswa->semester;
        $nilai->tahun_pelajaran = $siswa->tahunpelajaran->tahun_pelajaran;
        $nilai->kelas = $siswa->kelas->nama_kelas;
        $nilai->value = $request->value;
        
        $nilai->save();

        return redirect()->back()->with('success', 'Nilai berhasil ditambahkan');
    }

    public function update_nilai(Request $request, $id)
    {
        $rules = [
            'mapel_kode' => 'required',
            'value' => 'required',
        ];
        $messages = [
            'mapel_kode.required' => 'Nama Siswa tidak boleh kosong',
            'value.required' => 'Nama Siswa tidak boleh kosong',
        ];
        $validator = Validator::make($request->all(), $rules, $messages);
        if ($validator->fails()) {
            return redirect()->back()
                    ->withErrors($validator)
                    ->withInput();
        }

        $nilai = Nilai::findOrFail($id);
        $nilai->mapel_kode = $request->mapel_kode;
        $nilai->value = $request->value;
        $nilai->save();

        return redirect()->back()->with('success', 'Nilai berhasil diperbarui');
    }

    public function delete_nilai($id)
    {
        $nilai = Nilai::findOrFail($id);
        $nilai->delete();

        return redirect()->back()->with('success', 'Nilai berhasil dihapus');
    }
}