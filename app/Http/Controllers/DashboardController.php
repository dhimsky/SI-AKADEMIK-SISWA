<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\Auth;

class DashboardController extends Controller
{
    public function index() {
        $id = Auth()->user()->role_id;
        dd($id);
        return view('stafftu.dashboard.index');
    }
}
