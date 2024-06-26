<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;
use Illuminate\Validation\Rule;

class AkunController extends Controller
{
    public function index(){
        $akun = User::all();
        
        return view('admin.akun.index', compact('akun'));
    }

    public function store_akun(Request $request)
    {
        $rules = [
            'kode_identitas' => 'required|unique:users,kode_identitas',
            'nama_lengkap' => 'required',
            'role_id' => 'required',
        ];
        $messages = [
            'kode_identitas.required' => 'Kode Identitas tidak boleh kosong!',
            'kode_identitas.unique' => 'Kode Identitas sudah digunakan!',
            'nama_lengkap.required' => 'Nama Lengkap tidak boleh kosong!',
            'role_id.required' => 'Role tidak boleh kosong!',
        ];

        $validator = Validator::make($request->all(), $rules, $messages);
        if ($validator->fails()) {
            return redirect()->back()
                    ->withErrors($validator)
                    ->withInput();
        }

        $akun = new User();
        $akun->kode_identitas = $request->kode_identitas;
        $akun->role_id = $request->role_id;
        $akun->nama_lengkap = $request->nama_lengkap;
        $akun->password = Hash::make('abcd1234');
        $akun->save();

        return redirect()->back()->with('success', 'Akun berhasil ditambahkan');
    }

    public function update_akun(Request $request, $id)
    {
        $akun = User::findOrFail($id);
        $rules = [
            'kode_identitas' => [
                'required',
                Rule::unique('users')->ignore($akun->kode_identitas, 'kode_identitas'),
            ],
            'nama_lengkap' => 'required',
            'role_id' => 'required',
        ];
        $messages = [
            'kode_identitas.required' => 'Kode Identitas tidak boleh kosong!',
            'kode_identitas.unique' => 'Kode Identitas sudah digunakan!',
            'nama_lengkap.required' => 'Nama Lengkap tidak boleh kosong!',
            'role_id.required' => 'Role tidak boleh kosong!',
        ];

        $validator = Validator::make($request->all(), $rules, $messages);
        if ($validator->fails()) {
            return redirect()->back()
                    ->withErrors($validator)
                    ->withInput();
        }

        $akun->nama_lengkap = $request->nama_lengkap;
        $akun->role_id = $request->role_id;
        if (!empty($request->password_display)) {
            $akun->password = hash::make($request->password_display);
        }else {
            $akun->password = hash::make($request->password);
        }
        $akun->save();

        return redirect()->back()->with('success', 'Akun berhasil diperbarui');
    }

    public function delete_akun($id)
    {
        $akun = User::findOrFail($id);
        $akun->delete();

        return redirect()->back()->with('success', 'Akun berhasil dihapus');
    }
}