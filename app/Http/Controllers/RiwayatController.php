<?php

namespace App\Http\Controllers;

use App\AktaKelahiran;
use Illuminate\Http\Request;

class RiwayatController extends Controller
{
    public function index(){

        $akta = AktaKelahiran::all();
        return view('riwayat', compact('akta'));
    }
}
