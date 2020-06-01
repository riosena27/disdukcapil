<?php

namespace App\Http\Controllers;

use App\AktaKelahiran;
use Illuminate\Http\Request;

class OperatorController extends Controller
{
    public function index(){
        return view('operator.index');
    }

    public function akta(){
        $aktaUser = AktaKelahiran::where('status_operator', 1)
                                            ->orWhere('status_kasie', 2)->get();

        return view('operator.akta_kelahiran.index', [
            'aktaUser' => $aktaUser
        ]);
    }

    public function createReview(AktaKelahiran $akta){

        return view('operator.akta_kelahiran.create', [
            'akta' => $akta
        ]);

    }

    public function storeReview(Request $request, AktaKelahiran $akta){
        
        $akta->status_operator = $request->status_operator;
        $akta->review_operator = $request->review_operator;
        $akta->save();

        return redirect('operator/akta-kelahiran/')->with('success', 'Akta kelahiran '.$akta->nama_anak.' berhasil diperiksa' );
    }

}
