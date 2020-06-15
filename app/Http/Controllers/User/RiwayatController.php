<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class RiwayatController extends Controller
{
    public function index(){

        $akta = Auth::user()->aktakelahiran()->get();
        return view('user.riwayat', compact('akta'));
    }
}
