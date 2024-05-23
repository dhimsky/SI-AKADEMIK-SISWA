<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Angkatan;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class AngkatanController extends Controller
{
    public function index(){
        $angkatan = Angkatan::all();
        return view('admin.angkatan.index', compact('angkatan'));
    }

    public function store_angkatan(Request $request)
    {
        $rules = [
            'kode_angkatan' => 'required',
            'tahun_angkatan' => 'required',
        ];
        $messages = [
            'kode_angkatan.required' => 'Angkatan tidak boleh kosong!',
            'tahun_angkatan.required' => 'Tahun angkatan tidak boleh kosong!',
        ];

        $validator = Validator::make($request->all(), $rules, $messages);
        if ($validator->fails()) {
            return redirect()->back()
                    ->withErrors($validator)
                    ->withInput();
        }

        $angkatan = new Angkatan();
        $angkatan->kode_angkatan = $request->kode_angkatan;
        $angkatan->tahun_angkatan = $request->tahun_angkatan;
        $angkatan->save();

        return redirect()->back()->with('success', 'Angkatan berhasil ditambahkan');
    }

    public function update_angkatan(Request $request, $kode_angkatan)
    {
        $rules = [
            'kode_angkatan' => 'required',
            'tahun_angkatan' => 'required',
        ];
        $messages = [
            'kode_angkatan.required' => 'Angkatan tidak boleh kosong!',
            'tahun_angkatan.required' => 'Tahun angkatan tidak boleh kosong!',
        ];

        $validator = Validator::make($request->all(), $rules, $messages);
        if ($validator->fails()) {
            return redirect()->back()
                    ->withErrors($validator)
                    ->withInput();
        }

        $angkatan = Angkatan::findOrFail($kode_angkatan);
        $angkatan->kode_angkatan = $request->kode_angkatan;
        $angkatan->tahun_angkatan = $request->tahun_angkatan;
        $angkatan->save();

        return redirect()->back()->with('success', 'Angkatan berhasil diperbarui');
    }

    public function delete_angkatan($kode_angkatan)
    {
        $angkatan = Angkatan::findOrFail($kode_angkatan);
        $angkatan->delete();

        return redirect()->back()->with('success', 'Angkatan berhasil dihapus');
    }
}