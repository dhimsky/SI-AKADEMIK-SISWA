<?php

namespace App\Http\Controllers;

use App\Models\Role;
use App\Models\Siswa;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;

class ProfileController extends Controller
{
    public function index(){
        $kode_identitas = auth()->user()->kode_identitas;
        $user = User::where('kode_identitas', $kode_identitas)->get();
        $role = Role::all();
        return view('profile.index', compact('user', 'role'));
    }

    public function update(Request $request)
    {
        $rules = ['nama_lengkap' => 'required'];
        $messages = ['nama_lengkap.required' => 'Nama Lengkap tidak boleh kosong!'];
        $validator = Validator::make($request->all(), $rules, $messages);
        if ($validator->fails()) {
            return redirect()->back()
                    ->withErrors($validator)
                    ->withInput();
        }

        $user = User::findOrFail(Auth::user()->kode_identitas);
        $siswa = Siswa::findOrFail(Auth::user()->kode_identitas);
        $user->nama_lengkap = $request->nama_lengkap;
        $siswa->nama_siswa = $request->nama_lengkap;
        $user->save();
        $siswa->save();

        return redirect()->back()->with('success', 'Nama Lengkap berhasil diperbarui');
    }

    public function update_password(Request $request)
    {
        $rules = [
            'current_password' => 'required',
            'new_password' => 'required|min:8|confirmed',
        ];
    
        $messages = [
            'current_password.required' => 'Password lama tidak boleh kosong!',
            'new_password.required' => 'Password baru tidak boleh kosong!',
            'new_password.min' => 'Password baru harus memiliki minimal 8 karakter!',
            'new_password.confirmed' => 'Konfirmasi password baru tidak cocok!',
        ];
    
        $validator = Validator::make($request->all(), $rules, $messages);
    
        if ($validator->fails()) {
            return redirect()->back()
                    ->withErrors($validator)
                    ->withInput();
        }

        $user = User::findOrFail(Auth::user()->kode_identitas);

        if (!Hash::check($request->current_password, $user->password)) {
            return redirect()->back()
                ->withErrors(['current_password' => 'Password lama tidak sesuai!'])
                ->withInput();
        }

        $user->password = Hash::make($request->new_password);
        $user->save();

        return redirect()->back()->with('success', 'Password berhasil diperbarui');
    }
}
