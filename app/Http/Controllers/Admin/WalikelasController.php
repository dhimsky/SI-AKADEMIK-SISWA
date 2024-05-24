<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Kelas;
use App\Models\User;
use App\Models\Walikelas;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;
use Illuminate\Validation\Rule;

class WalikelasController extends Controller
{
    public function index(){
        $walikelas = Walikelas::all();
        // dd($walikelas);
        $kelas = Kelas::all();
        return view('admin.walikelas.index', compact('walikelas', 'kelas'));
    }

    public function store_walikelas(Request $request)
    {
        // Validasi
        $rules = [
            'nip' => 'required|unique:users,kode_identitas',
            'nama_walikelas' => 'required',
            'jenis_kelamin' => 'required',
            'kelas_id' => 'required',
            'email' => 'required|unique:users,email',
            'password' => 'required',
        ];
        $messages = [
            'nip.required' => 'NIP tidak boleh kosong!',
            'nip.unique' => 'NIP sudah digunakan!',
            'nama_walikelas.required' => 'Nama Lengkap tidak boleh kosong!',
            'jenis_kelamin.required' => 'Jenis Kelamin tidak boleh kosong!',
            'kelas_id.required' => 'Sebagai Wali Kelas tidak boleh kosong!',
            'email.required' => 'Email tidak boleh kosong!',
            'email.unique' => 'Email sudah digunakan!',
            'password.required' => 'Password tidak boleh kosong!',
        ];

        $validator = Validator::make($request->all(), $rules, $messages);
        if ($validator->fails()) {
            return redirect()->back()
                    ->withErrors($validator)
                    ->withInput();
        }

        //menambahkan akun walikelas ke table USERS
        $user = new User();
        $user->kode_identitas = $request->nip;
        $user->nama_lengkap = $request->nama_walikelas;
        $user->role_id = 2;
        $user->email = $request->email;
        $user->password = Hash::make($request->password);
        $user->save();

        //insert data wali kelas ke table WALIKELAS
        $walikelas = new Walikelas();
        $walikelas->nip = $request->nip;
        $walikelas->nama_walikelas = $request->nama_walikelas;
        $walikelas->jenis_kelamin = $request->jenis_kelamin;
        $walikelas->kelas_id = $request->kelas_id;
        $walikelas->email = $request->email;
        $walikelas->password = Hash::make($request->password);
        $walikelas->save();

        return redirect()->back()->with('success', 'Wali Kelas berhasil ditambahkan');
    }

    public function update_walikelas(Request $request, $id)
    {
        $akun = Walikelas::findOrFail($id);
        // Validasi
        $rules = [
            'nip' => [
                'required',
                Rule::unique('walikelas')->ignore($akun->nip, 'nip'),
            ],
            'email' => [
                'required',
                'email',
                Rule::unique('walikelas')->ignore($akun->email, 'email'),
            ],
            'nama_walikelas' => 'required',
            'jenis_kelamin' => 'required',
            'kelas_id' => 'required',
        ];

        $messages = [
            'nip.required' => 'NIP tidak boleh kosong!',
            'nip.unique' => 'NIP sudah digunakan!',
            'nama_walikelas.required' => 'Nama Lengkap tidak boleh kosong!',
            'jenis_kelamin.required' => 'Jenis Kelamin tidak boleh kosong!',
            'kelas_id.required' => 'Sebagai Wali Kelas tidak boleh kosong!',
            'email.required' => 'Email tidak boleh kosong!',
            'email.unique' => 'Email sudah digunakan!',
            'password.required' => 'Password tidak boleh kosong!',
        ];

        $validator = Validator::make($request->all(), $rules, $messages);
        if ($validator->fails()) {
            return redirect()->back()
                    ->withErrors($validator)
                    ->withInput();
        }

        $walikelas = Walikelas::findOrFail($id);
        $walikelas->nip = $request->nip;
        $walikelas->nama_walikelas = $request->nama_walikelas;
        $walikelas->jenis_kelamin = $request->jenis_kelamin;
        $walikelas->kelas_id = $request->kelas_id;
        $walikelas->email = $request->email;
        if (!empty($request->password_display)) {
            $walikelas->password = Hash::make($request->password_display);
        } else {
            $walikelas->password = Hash::make($request->password);
        }
        $walikelas->save();

        return redirect()->back()->with('success', 'Wali Kelas berhasil diperbarui');
    }

    public function delete_walikelas($id)
    {
        $walikelas = Walikelas::findOrFail($id);
        $walikelas->delete();

        return redirect()->back()->with('success', 'Wali Kelas berhasil dihapus');
    }
}