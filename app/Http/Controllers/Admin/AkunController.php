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
            'email' => 'required|email|unique:users,email',
            'nama_lengkap' => 'required',
            'password' => 'required',
        ];
        $messages = [
            'kode_identitas.required' => 'Kode Identitas tidak boleh kosong!',
            'kode_identitas.unique' => 'Kode Identitas sudah digunakan!',
            'email.required' => 'Email tidak boleh kosong!',
            'email.unique' => 'Email sudah digunakan!',
            'email.email' => 'Email tidak valid!',
            'kode_identitas.unique' => 'Kode Identitas sudah digunakan!',
            'nama_lengkap.required' => 'Nama Lengkap tidak boleh kosong!',
            'password.required' => 'Password tidak boleh kosong!',
        ];

        $validator = Validator::make($request->all(), $rules, $messages);
        if ($validator->fails()) {
            return redirect()->back()
                    ->withErrors($validator)
                    ->withInput();
        }

        $akun = new User();
        $akun->kode_identitas = $request->kode_identitas;
        $akun->email = $request->email;
        $akun->role_id = 1;
        $akun->nama_lengkap = $request->nama_lengkap;
        $akun->password = Hash::make($request->password);
        $akun->save();

        return redirect()->back()->with('success', 'Akun berhasil ditambahkan');
    }

    public function update_akun(Request $request, $id)
    {
        $akun = User::findOrFail($id);

        $rules = [
            'kode_identitas' => 'required|unique:users,kode_identitas',
            'email' => 'required|email|unique:users,email',
            'nama_lengkap' => 'required',
        ];
        // Definisikan aturan validasi
        $rules = [
            'kode_identitas' => [
                'required',
                Rule::unique('users')->ignore($akun->kode_identitas, 'kode_identitas'),
            ],
            'email' => [
                'required',
                'email',
                Rule::unique('users')->ignore($akun->kode_identitas, 'kode_identitas'),
            ],
            'nama_lengkap' => 'required',
        ];
        $messages = [
            'kode_identitas.required' => 'Kode Identitas tidak boleh kosong!',
            'kode_identitas.unique' => 'Kode Identitas sudah digunakan!',
            'email.required' => 'Email tidak boleh kosong!',
            'email.unique' => 'Email sudah digunakan!',
            'email.email' => 'Email tidak valid!',
            'kode_identitas.unique' => 'Kode Identitas sudah digunakan!',
            'nama_lengkap.required' => 'Nama Lengkap tidak boleh kosong!',
            'password.required' => 'Password tidak boleh kosong!',
        ];

        $validator = Validator::make($request->all(), $rules, $messages);
        if ($validator->fails()) {
            return redirect()->back()
                    ->withErrors($validator)
                    ->withInput();
        }

        
        $akun->email = $request->email;
        $akun->nama_lengkap = $request->nama_lengkap;
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
