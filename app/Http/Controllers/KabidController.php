<?php

namespace App\Http\Controllers;

use App\AktaKelahiran;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class KabidController extends Controller
{
    public function index(){

        return view('kabid.index');
    }

    public function akta(){
        
        $akta = AktaKelahiran::where([
            ['status_kasie', 3],
            ['status_kabid', 1]
        ])->orWhere([
            ['status_kadis', 2],
            ['status_kabid', 1]
        ])->get();

        return view('kabid.akta_kelahiran.index', [
            'aktaUser' => $akta
        ]);
    }

    public function createReview(AktaKelahiran $akta){

        return view('kabid.akta_kelahiran.create', [
            'akta' => $akta
        ]);

    }

    public function storeReview(Request $request, AktaKelahiran $akta){
        
        $kabid = Auth::user()->id;

        $akta->status_kabid = $request->status_kabid;
        $akta->review_kabid = $request->review_kabid;
        $akta->kabid_id = $kabid;
        $akta->save();

        if($request->status_kabid == 3){
            $akta->status_kadis= 1;
            $akta->save();
        }

        if($request->status_kabid == 2){
            $akta->status_kasie = 1;
            $akta->save();
        }

        return redirect('kabid/akta-kelahiran/')->with('success', 'Akta kelahiran '.$akta->nama_anak.' berhasil diperiksa' );
    }

    public function openPdf(AktaKelahiran $akta, Request $request){

        $userName = $akta->user->name;

        $path = storage_path('app/public/Data User/'.$userName.'/AktaKelahiran/'.$akta->no_resi.'/'.$request->pdf);

        return response()->file($path);
    }

    public function reviewChecked(Request $request){

        $statKabid = $request->statusKabid;
        $kabid = Auth::user()->id;

        if($request->has('status')){
            $akta = AktaKelahiran::find($request->status);
            foreach($akta as $akt){
                $akt->status_kabid = $statKabid;
                if($statKabid == 2){
                    $akt->status_kasie = 1;
                }

                if($statKabid == 3){
                    $akt->status_kadis = 1;
                }
                $akt->kabid_id = $kabid;
                $akt->save();
            }
            $size = count($akta);
            $stat = ' akta kelahiran berhasil disetujui!';
            if($statKabid == 2){
                $stat = ' akta kelahiran telah ditolak!';
            }
            return back()->with('blue', $size.$stat);
        }

        return back()->with('red', 'Pilih salah satu akta kelahiran terlebih dahulu!');
    }

    
}
