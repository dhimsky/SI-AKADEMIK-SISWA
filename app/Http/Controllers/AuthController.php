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
                return redirect()->intended('dashboard');
            } elseif ($user->role_id == '2') {
                return redirect()->intended('home');
            }
        }
        return view('auth.login');
    }
    function login(Request $request)
    {
        Session::flash('email', $request->input('email'));
    
        $request->validate([
            'email' => 'required',
            'password' => 'required',
        ],[
            'email.required' => 'masukan email',
            'password.required' => 'masukan password'
        ]);

        $data = [
            'email' => $request->input('email'),
            'password' => $request->input('password'),
        ];
    
        if (Auth::attempt($data)) {
            $request->session()->regenerate();
            $user = Auth::user();
            if ($user->role_id == '1') {
                return redirect()->intended('dashboard')->with('toast_success','Selamat, anda berhasil masuk.');
            } elseif ($user->role_id == '2') {
                return redirect()->intended('home')->with('toast_success','Selamat, anda berhasil masuk.');
            }
        }
        return redirect('/')->with('toast_error','email atau Password yang dimasukkan tidak sesuai');
    }
    public function logout(Request $request) {
        Auth::logout();
        $request->session()->invalidate();
        $request->session()->regenerateToken();

        return redirect('/')->with('toast_success', 'Berhasil Keluar');
    }
}