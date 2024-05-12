<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Validator;
use App\Models\User;

class AuthController extends Controller
{
    
    public function login() {

        // $id = User::all();
        //     dd($id);
        return view('auth.login');
    }

    public function actionlogin(Request $request) {
        
        $data = [
            'email' => $request->input('email'),
            'password' => $request->input('password'),
        ];
        // dd($data);

        if (Auth::attempt($data)) {
            if (auth()->user()->role_id == 1) {
                return redirect()->route('st.dashboard');
            }
            else if (auth()->user()->role_id == 2) {
                return redirect()->route('wk.dashboard');
            }
        }
        else {
            return redirect('/login')->with('failed', 'Email atau Password salah');
        }
    }
}
