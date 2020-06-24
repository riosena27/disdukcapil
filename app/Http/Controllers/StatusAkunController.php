<?php

namespace App\Http\Controllers;

use App\AktaKelahiran;
use Illuminate\Http\Request;

class StatusAkunController extends Controller
{
    public function index(Request $request){

        if($request->filled('kode_resi')){
            $akta = AktaKelahiran::where('no_resi', $request->kode_resi)->first();

            if($akta){
                return view('status_akun', [
                    'akta' => $akta,
                    'kode' => $request->kode_resi
                ]);
            }
            return back()->with('failed', 'No Resi yang anda cari tidak ditemukan');
        }
        return view('status_akun');
    }
}
