<?php

namespace App\Http\Controllers;

use App\AktaKelahiran;
use Illuminate\Http\Request;
use Illuminate\Support\Carbon;
use Illuminate\Support\Facades\Auth;

class OperatorLoketController extends Controller
{
    public function index(){

        $akta = AktaKelahiran::where('status_pengambilan', '<>', null)->where('tanggal_pengambilan', null)->get();

        return view('operator_loket.index', [
            'akta' => $akta
        ]);
    }

    public function setPengambilan(AktaKelahiran $akta, Request $request){
        $operator = Auth::user()->id;
        $tanggalPengambilan = new Carbon($request->tanggal_pengambilan);
        $akta->tanggal_pengambilan = $tanggalPengambilan;
        $akta->operator_loket_id = $operator;
        $akta->deskripsi_pengambilan = $request->deskripsi_pengambilan;
        $akta->save();

        return back()->with('success', 'Tanggal dan deskripsi pengambilan berhasil di set');
    }
}
