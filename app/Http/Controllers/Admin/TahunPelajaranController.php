<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\TahunPelajaran;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class TahunPelajaranController extends Controller
{
    public function index(){
        $tahunpelajaran = TahunPelajaran::all();
        return view('admin.tahunpelajaran.index', compact('tahunpelajaran'));
    }

    public function store(Request $request)
    {
        $rules = [
            'tahun_pelajaran' => 'required',
        ];
        $messages = [
            'tahun_pelajaran.required' => 'Tahun Pelajaran tidak boleh kosong!',
        ];
        $validator = Validator::make($request->all(), $rules, $messages);
        if ($validator->fails()) {
            return redirect()->back()
                    ->withErrors($validator)
                    ->withInput();
        }

        $tahunPelajaran = new TahunPelajaran();
        $tahunPelajaran->tahun_pelajaran = $request->tahun_pelajaran;
        $tahunPelajaran->save();

        return redirect()->back()->with('success', 'Tahun Pelajaran berhasil ditambahkan');
    }

    public function update(Request $request, $id)
    {
        $rules = [
            'tahun_pelajaran' => 'required',
        ];
        $messages = [
            'tahun_pelajaran.required' => 'Tahun Pelajaran tidak boleh kosong!',
        ];
        $validator = Validator::make($request->all(), $rules, $messages);
        if ($validator->fails()) {
            return redirect()->back()
                    ->withErrors($validator)
                    ->withInput();
        }

        $tahunPelajaran = TahunPelajaran::findOrFail($id);
        $tahunPelajaran->tahun_pelajaran = $request->tahun_pelajaran;
        $tahunPelajaran->save();

        return redirect()->back()->with('success', 'Tahun Pelajaran berhasil diubah');
    }

    public function delete($id)
    {
        $tahunPelajaran = TahunPelajaran::findOrFail($id);
        $tahunPelajaran->delete();

        return redirect()->back()->with('success', 'Tahun Pelajaran berhasil dihapus');
    }
}