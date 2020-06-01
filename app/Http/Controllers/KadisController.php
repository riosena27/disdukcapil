<?php

namespace App\Http\Controllers;

use App\AktaKelahiran;
use Illuminate\Http\Request;

class KadisController extends Controller
{
    public function index(){
        
        return view('kadis.index');
    }

    public function akta(){

        $akta = AktaKelahiran::where([
            ['status_kabid', 3],
            ['status_kadis', 1]
        ])->get();

        return view('kadis.akta_kelahiran.index', [
            'aktaUser' => $akta
        ]);
    }

    public function createReview(AktaKelahiran $akta){

        return view('kadis.akta_kelahiran.create', [
            'akta' => $akta
        ]);

    }

    public function storeReview(Request $request, AktaKelahiran $akta){
        
        $akta->status_kadis = $request->status_kadis;
        $akta->review_kadis = $request->review_kadis;
        $akta->save();

        if($request->status_kadis == 2){
            $akta->status_kabid = 1;
            $akta->save();
        }

        return redirect('kadis/akta-kelahiran/')->with('success', 'Akta kelahiran '.$akta->nama_anak.' berhasil diperiksa' );
    }

    public function openPdf(AktaKelahiran $akta, Request $request){

        $userName = $akta->user->name;

        $path = storage_path('app/public/Data User/'.$userName.'/AktaKelahiran/'.$akta->no_resi.'/'.$request->pdf);

        return response()->file($path);
    }
}
