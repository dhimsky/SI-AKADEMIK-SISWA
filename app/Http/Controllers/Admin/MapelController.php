<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Mapel;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class MapelController extends Controller
{
    public function index(){
        $mapel = Mapel::all();
        return view('admin.mapel.index', compact('mapel'));
    }

    public function store_mapel(Request $request)
    {
        $rules = [
            'kode_mapel' => 'required',
            'nama_mapel' => 'required',
        ];
        $messages = [
            'kode_mapel.required' => 'Kode Mapel tidak boleh kosong!',
            'nama_mapel.required' => 'Nama Mapel tidak boleh kosong!',
        ];

        $validator = Validator::make($request->all(), $rules, $messages);
        if ($validator->fails()) {
            return redirect()->back()
                    ->withErrors($validator)
                    ->withInput();
        }

        $mapel = new Mapel();
        $mapel->kode_mapel = $request->kode_mapel;
        $mapel->nama_mapel = $request->nama_mapel;
        $mapel->save();

        return redirect()->back()->with('success', 'Mapel berhasil ditambahkan');
    }

    public function update_mapel(Request $request, $kode_mapel)
    {
        $rules = [
            'kode_mapel' => 'required',
            'nama_mapel' => 'required',
        ];
        $messages = [
            'kode_mapel.required' => 'Kode Mapel tidak boleh kosong!',
            'nama_mapel.required' => 'Nama Mapel tidak boleh kosong!',
        ];

        $validator = Validator::make($request->all(), $rules, $messages);
        if ($validator->fails()) {
            return redirect()->back()
                    ->withErrors($validator)
                    ->withInput();
        }

        $mapel = Mapel::findOrFail($kode_mapel);
        $mapel->kode_mapel = $request->kode_mapel;
        $mapel->nama_mapel = $request->nama_mapel;
        $mapel->save();

        return redirect()->back()->with('success', 'Mapel berhasil diperbarui');
    }

    public function delete_mapel($kode_mapel)
    {
        $mapel = Mapel::findOrFail($kode_mapel);
        $mapel->delete();

        return redirect()->back()->with('success', 'Mapel berhasil dihapus');
    }
}