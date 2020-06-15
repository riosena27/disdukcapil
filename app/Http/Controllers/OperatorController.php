<?php

namespace App\Http\Controllers;

use App\AktaKelahiran;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class OperatorController extends Controller
{
    public function index(){
        return view('operator.index');
    }

    public function akta(){
        $aktaUser = AktaKelahiran::where('status_operator', 1)->orWhere('status_kasie', 2)->get();

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
        
        $data = $request->except(['surat_keterangan_lahir', 'kartu_keluarga', 'keterangan_akta_orang_tua', 'sptjm_pasutri', 'keterangan_permohonan_kelahiran', 'sptjm_kebenaran_kelahiran', 'keterangan_anak_kawin', 'pernyataan_saksi', 'ktp_saksi_balikpapan', 'surat_kuasa', 'fotocopy_akta_anak']);
        $akta->update($data);
        
        $operator = Auth::user()->id;
        $akta->status_operator = $request->status_operator;
        $akta->review_operator = $request->review_operator;
        $akta->operator_id = $operator;
        $akta->save();
        

        if($akta->status_operator == 3){
            $akta->status_kasie = 1;
            $akta->save();

            if(isset($akta->status_kabid)){
                $akta->status_kabid = null;
                $akta->review_kabid = null;
                $akta->save();
            }
        }

        return redirect('operator/akta-kelahiran/')->with('success', 'Akta kelahiran '.$akta->nama_anak.' berhasil diperiksa' );
    }

    public function openPdf(AktaKelahiran $akta, Request $request){

        $userName = $akta->user->name;

        $path = storage_path('app/public/Data User/'.$userName.'/AktaKelahiran/'.$akta->no_resi.'/'.$request->pdf);

        return response()->file($path);
    }

}
