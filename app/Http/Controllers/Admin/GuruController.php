<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Guru;
use App\Models\Kelas;
use App\Models\Mapel;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;
use Illuminate\Validation\Rule;

class GuruController extends Controller
{
    public function index(){
        $guru = Guru::all();
        // dd($guru);
        $kelas = Kelas::all();
        $mapel = Mapel::all();
        return view('admin.guru.index', compact('guru', 'kelas', 'mapel'));
    }

    public function store_guru(Request $request)
    {
        // Validasi
        $rules = [
            'nip' => 'required|unique:users,kode_identitas',
            'nama_guru' => 'required',
            'mapel_kode' => 'required',
            'kelas_id' => 'required',
            'email' => 'required|unique:users,email',
            'password' => 'required',
        ];
        $messages = [
            'nip.required' => 'NIP tidak boleh kosong!',
            'nip.unique' => 'NIP sudah digunakan!',
            'nama_guru.required' => 'Nama Lengkap tidak boleh kosong!',
            'mapel_kode.required' => 'Mapel tidak boleh kosong!',
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

        //menambahkan akun guru ke table USERS
        $user = new User();
        $user->kode_identitas = $request->nip;
        $user->nama_lengkap = $request->nama_guru;
        $user->role_id = 2;
        $user->email = $request->email;
        $user->password = Hash::make($request->password);
        $user->save();

        //insert data wali kelas ke table Guru
        $guru = new Guru();
        $guru->nip = $request->nip;
        $guru->nama_guru = $request->nama_guru;
        $guru->mapel_kode = $request->mapel_kode;
        $guru->kelas_id = $request->kelas_id;
        $guru->email = $request->email;
        $guru->save();

        return redirect()->back()->with('success', 'Guru Kelas berhasil ditambahkan');
    }

    public function update_guru(Request $request, $id)
    {
        $akun = Guru::findOrFail($id);
        // Validasi
        $rules = [
            'nip' => [
                'required',
                Rule::unique('guru')->ignore($akun->nip, 'nip'),
            ],
            'email' => [
                'required',
                'email',
                Rule::unique('guru')->ignore($akun->email, 'email'),
            ],
            'nama_guru' => 'required',
            'mapel_kode' => 'required',
            'kelas_id' => 'required',
        ];

        $messages = [
            'nip.required' => 'NIP tidak boleh kosong!',
            'nip.unique' => 'NIP sudah digunakan!',
            'nama_guru.required' => 'Nama Lengkap tidak boleh kosong!',
            'mapel_kode.required' => 'Mapel tidak boleh kosong!',
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

        $guru = Guru::findOrFail($id);
        $guru->nip = $request->nip;
        $guru->nama_guru = $request->nama_guru;
        $guru->mapel_kode = $request->mapel_kode;
        $guru->kelas_id = $request->kelas_id;
        $guru->email = $request->email;
        if (!empty($request->password_display)) {
            $guru->password = Hash::make($request->password_display);
        } else {
            $guru->password = Hash::make($request->password);
        }
        $guru->save();

        return redirect()->back()->with('success', 'Guru Kelas berhasil diperbarui');
    }

    public function delete_guru($id)
    {
        $guru = Guru::findOrFail($id);
        $guru->delete();

        return redirect()->back()->with('success', 'Guru Kelas berhasil dihapus');
    }
}