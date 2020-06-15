<?php

namespace App\Http\Controllers;

use App\AktaKelahiran;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class KasieController extends Controller
{
    public function index(){

        return view('kasie.index');
    }

    public function akta(){

        $akta = AktaKelahiran::where([
            ['status_operator', 3],
            ['status_kasie', 1]
        ])->orWhere([
            ['status_kabid', 2],
            ['status_kasie', 1]
        ])->get();

        return view('kasie.akta_kelahiran.index', [
            'aktaUser' => $akta
        ]);
    }

    public function createReview(AktaKelahiran $akta){

        return view('kasie.akta_kelahiran.create', [
            'akta' => $akta
        ]);

    }

    public function storeReview(Request $request, AktaKelahiran $akta){
        
        $kasie = Auth::user()->id;
        $akta->status_kasie = $request->status_kasie;
        $akta->review_kasie = $request->review_kasie;
        $akta->kasie_id = $kasie;
        $akta->save();

        if($request->status_kasie == 3){
            $akta->status_kabid = 1;
            $akta->save();

            if(isset($akta->status_kadis)){
                $akta->status_kadis = null;
                $akta->review_kadis = null;
                $akta->save();
            }
        }

        if($request->status_kasie == 2){
            $akta->status_operator = 1;
            $akta->save();
        }

        return redirect('kasie/akta-kelahiran/')->with('success', 'Akta kelahiran '.$akta->nama_anak.' berhasil diperiksa' );
    }

    public function openPdf(AktaKelahiran $akta, Request $request){

        $userName = $akta->user->name;

        $path = storage_path('app/public/Data User/'.$userName.'/AktaKelahiran/'.$akta->no_resi.'/'.$request->pdf);

        return response()->file($path);
    }
}
