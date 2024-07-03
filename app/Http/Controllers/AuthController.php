<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Validator;
use App\Models\User;
use Illuminate\Support\Facades\Session;

class AuthController extends Controller
{
    public function index () {
        $user = Auth::user();
        if ($user) {
            if ($user->role_id == '1') {
                return redirect()->route('admin.dashboard');
            } elseif ($user->role_id == '2') {
                return redirect()->route('guru.dashboard');
            } elseif ($user->role_id == '3') {
                return redirect()->route('siswa.dashboard');
            }elseif ($user->role_id == '4') {
                return redirect()->route('kepsek.dashboard');
            }
        }
        return view('auth.login');
    }
    function login(Request $request)
    {
        Session::flash('kode_identitas', $request->input('kode_identitas'));
    
        $request->validate([
            'kode_identitas' => 'required',
            'password' => 'required',
        ],[
            'kode_identitas.required' => 'masukan kode_identitas',
            'password.required' => 'masukan password'
        ]);

        $data = [
            'kode_identitas' => $request->input('kode_identitas'),
            'password' => $request->input('password'),
        ];
    
        if (Auth::attempt($data)) {
            $request->session()->regenerate();
            $user = Auth::user();
            if ($user->role_id == '1') {
                return redirect()->route('admin.dashboard');
            } elseif ($user->role_id == '2') {
                return redirect()->route('guru.dashboard');
            } elseif ($user->role_id == '3') {
                return redirect()->route('siswa.dashboard');
            }elseif ($user->role_id == '4') {
                return redirect()->route('kepsek.dashboard');
            }
        }
        return redirect('/')->with('error', 'Kode Identitas atau password salah!');
    }
    public function logout(Request $request) {
        Auth::logout();
        $request->session()->invalidate();
        $request->session()->regenerateToken();

        return redirect('/');
    }
}