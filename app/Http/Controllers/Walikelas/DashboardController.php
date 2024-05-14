<?php

namespace App\Http\Controllers\Walikelas;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class DashboardController extends Controller
{
    public function index(){
        return view('walikelas.dashboard.index');
    }
}