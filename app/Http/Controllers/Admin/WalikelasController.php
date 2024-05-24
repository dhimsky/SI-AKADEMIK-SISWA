<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Walikelas;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class WalikelasController extends Controller
{
    public function index(){
        return view('admin.walikelas.index');
    }

    public function store_walikelas(Request $request)
    {
        $rules = [
            'nip' => 'required',
            'nama_lengkap' => 'required',
            'jenis_kelamin' => 'required',
            'kelas_id' => 'required',
            'email' => 'required',
            'password' => 'required',
        ];
        $messages = [
            'nip.required' => 'NIP tidak boleh kosong!',
            'nama_lengkap.required' => 'Nama Lengkap tidak boleh kosong!',
            'jenis_kelamin.required' => 'Jenis Kelamin tidak boleh kosong!',
            'kelas_id.required' => 'Sebagai Wali Kelas tidak boleh kosong!',
            'email.required' => 'Email tidak boleh kosong!',
            'password.required' => 'Password tidak boleh kosong!',
        ];

        $validator = Validator::make($request->all(), $rules, $messages);
        if ($validator->fails()) {
            return redirect()->back()
                    ->withErrors($validator)
                    ->withInput();
        }

        $walikelas = new Walikelas();
        $walikelas->nip = $request->nip;
        $walikelas->nama_lengkap = $request->nama_lengkap;
        $walikelas->jenis_kelamin = $request->jenis_kelamin;
        $walikelas->kelas_id = $request->kelas_id;
        $walikelas->email = $request->email;
        $walikelas->password = $request->password;
        $walikelas->save();

        return redirect()->back()->with('success', 'Wali Kelas berhasil ditambahkan');
    }
}