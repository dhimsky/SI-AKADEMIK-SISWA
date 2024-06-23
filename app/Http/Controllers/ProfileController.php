<?php

namespace App\Http\Controllers;

use App\Models\Role;
use App\Models\User;
use Illuminate\Http\Request;

class ProfileController extends Controller
{
    public function index(){
        $kode_identitas = auth()->user()->kode_identitas;
        $user = User::where('kode_identitas', $kode_identitas)->get();
        $role = Role::all();
        return view('profile.index', compact('user', 'role'));
    }
}
