<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Rombel;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class RombelController extends Controller
{
    public function index(){
        $rombel = Rombel::all();
        return view('admin.rombel.index', compact('rombel'));
    }

    public function store_rombel(Request $request)
    {
        $rules = [
            'kode_rombel' => 'required',
            'nama_rombel' => 'required',
        ];
        $messages = [
            'kode_rombel.required' => 'Kode Rombel tidak boleh kosong!',
            'nama_rombel.required' => 'Nama Rombel tidak boleh kosong!'
        ];

        $validator = Validator::make($request->all(), $rules, $messages);
        if ($validator->fails()) {
            return redirect()->back()
                    ->withErrors($validator)
                    ->withInput();
        }

        $rombel = new Rombel();
        $rombel->kode_rombel = $request->kode_rombel;
        $rombel->nama_rombel = $request->nama_rombel;
        $rombel->save();

        return redirect()->back()->with('success', 'Rombel berhasil ditambahkan');
    }

    public function update_rombel(Request $request, $kode_rombel)
    {
        $rules = [
            'kode_rombel' => 'required',
            'nama_rombel' => 'required',
        ];
        $messages = [
            'kode_rombel.required' => 'Kode Rombel tidak boleh kosong!',
            'nama_rombel.required' => 'Nama Rombel tidak boleh kosong!'
        ];

        $validator = Validator::make($request->all(), $rules, $messages);
        if ($validator->fails()) {
            return redirect()->back()
                    ->withErrors($validator)
                    ->withInput();
        }

        $rombel = Rombel::findOrFail($kode_rombel);
        $rombel->kode_rombel = $request->kode_rombel;
        $rombel->nama_rombel = $request->nama_rombel;
        $rombel->save();

        return redirect()->back()->with('success', 'Rombel berhasil diperbarui');
    }

    public function delete_rombel($kode_rombel)
    {
        $rombel = Rombel::findOrFail($kode_rombel);
        $rombel->delete();

        return redirect()->back()->with('success', 'Rombel berhasil dihapus');
    }
}