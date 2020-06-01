<?php

namespace App\Http\Controllers\User;

use App\AktaKelahiran;
use App\Http\Controllers\Controller;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Str;

class AktaKelahiranController extends Controller
{
    public function index(){

        $akta = Auth::user()->aktakelahiran;

        return view('user.akta_kelahiran.index', [
            'akta' => $akta
        ]);
    }

    public function create(){
        return view('user.akta_kelahiran.create');
    }

    public function store(Request $request){
        $userId = Auth::user()->id;
        $userName = Auth::user()->name;
        $waktu = Carbon::now()->format('dmyy');
        $data = $request->except(['surat_keterangan_lahir', 'kartu_keluarga', 'keterangan_akta_orang_tua', 'sptjm_pasutri', 'keterangan_permohonan_kelahiran', 'sptjm_kebenaran_kelahiran', 'keterangan_anak_kawin', 'pernyataan_saksi', 'ktp_saksi_balikpapan', 'surat_kuasa', 'fotocopy_akta_anak']);

        $suratKeteranganLahir = $request->file('surat_keterangan_lahir');
        $suratKeteranganLahirName = $suratKeteranganLahir->getClientOriginalName();

        $kartuKeluarga = $request->file('kartu_keluarga');
        $kartuKeluargaName = $kartuKeluarga->getClientOriginalName();

        $keteranganAktaOrtu = $request->file('keterangan_akta_orang_tua');
        $keteranganAktaOrtuName = $keteranganAktaOrtu->getClientOriginalName();

        $sptjmPasutri = $request->file('sptjm_pasutri');
        $sptjmPasutriName = $sptjmPasutri->getClientOriginalName();
        
        $keteranganPermohonanKelahiran = $request->file('keterangan_permohonan_kelahiran');
        $keteranganPermohonanKelahiranName = $keteranganPermohonanKelahiran->getClientOriginalName();
        
        $sptjmKebenaranKelahiran = $request->file('sptjm_kebenaran_kelahiran');
        $sptjmKebenaranKelahiranName = $sptjmKebenaranKelahiran->getClientOriginalName();
        
        $keteranganAnakKawin = $request->file('keterangan_anak_kawin');
        $keteranganAnakKawinName = $keteranganAnakKawin->getClientOriginalName();

        $pernyataanSaksi = $request->file('pernyataan_saksi');
        $pernyataanSaksiName = $pernyataanSaksi->getClientOriginalName();

        $ktpSaksiBpn = $request->file('ktp_saksi_balikpapan');
        $ktpSaksiBpnName = $ktpSaksiBpn->getClientOriginalName();

        $suratKuasa = $request->file('surat_kuasa');
        $suratKuasaName = $suratKuasa->getClientOriginalName();

        $fotocopyAktaAnak = $request->file('fotocopy_akta_anak');
        $fotocopyAktaAnakName = $fotocopyAktaAnak->getClientOriginalName();

        $data['user_id'] = $userId;
        $randomString = Str::random(5);
        $data['no_resi'] = $userId.$waktu.$randomString;
        $data['surat_keterangan_lahir'] = $suratKeteranganLahirName;
        $data['kartu_keluarga'] = $kartuKeluargaName;
        $data['keterangan_akta_orang_tua'] = $keteranganAktaOrtuName;
        $data['sptjm_pasutri'] = $sptjmPasutriName;
        $data['keterangan_permohonan_kelahiran'] = $keteranganPermohonanKelahiranName;
        $data['sptjm_kebenaran_kelahiran'] = $sptjmKebenaranKelahiranName;
        $data['keterangan_anak_kawin'] = $keteranganAnakKawinName;
        $data['pernyataan_saksi'] = $pernyataanSaksiName;
        $data['ktp_saksi_balikpapan'] = $ktpSaksiBpnName;
        $data['surat_kuasa'] = $suratKuasaName;
        $data['fotocopy_akta_anak'] = $fotocopyAktaAnakName;
        $data['status_operator'] = 1;

        AktaKelahiran::create($data);

        $fileTujuan = 'public/Data User/'.$userName.'/AktaKelahiran/'.$data['no_resi'];

        $suratKeteranganLahir->storeAs($fileTujuan, $suratKeteranganLahirName);
        $kartuKeluarga->storeAs($fileTujuan, $kartuKeluargaName);
        $keteranganAktaOrtu->storeAs($fileTujuan, $keteranganAktaOrtuName);
        $sptjmPasutri->storeAs($fileTujuan, $sptjmPasutriName);
        $keteranganPermohonanKelahiran->storeAs($fileTujuan, $keteranganPermohonanKelahiranName);
        $sptjmKebenaranKelahiran->storeAs($fileTujuan, $sptjmKebenaranKelahiranName);
        $keteranganAnakKawin->storeAs($fileTujuan, $keteranganAnakKawinName);
        $pernyataanSaksi->storeAs($fileTujuan, $pernyataanSaksiName);
        $ktpSaksiBpn->storeAs($fileTujuan, $ktpSaksiBpnName);
        $suratKuasa->storeAs($fileTujuan, $suratKuasaName);
        $fotocopyAktaAnak->storeAs($fileTujuan, $fotocopyAktaAnakName);

        return redirect('akta-kelahiran')->with('success', 'Akta Kelahiran berhasil dibuat');

    }

    public function edit(AktaKelahiran $akta){

        return view('user.akta_kelahiran.edit', [
            'akta' => $akta
        ]);
    }

    public function update(AktaKelahiran $akta, Request $request){

        $userName = Auth::user()->name;

        $data = $request->except(['surat_keterangan_lahir', 'kartu_keluarga', 'keterangan_akta_orang_tua', 'sptjm_pasutri', 'keterangan_permohonan_kelahiran', 'sptjm_kebenaran_kelahiran', 'keterangan_anak_kawin', 'pernyataan_saksi', 'ktp_saksi_balikpapan', 'surat_kuasa', 'fotocopy_akta_anak']);
        $data['status_operator'] = 1;

        $fileTujuan = 'public/Data User/'.$userName.'/AktaKelahiran/'.$akta->no_resi.'/';

        if($request->hasFile('surat_keterangan_lahir')) {
            $suratKeteranganLahir = $request->file('surat_keterangan_lahir');
            $suratKeteranganLahirName = $suratKeteranganLahir->getClientOriginalName();
            $currentSkl = $akta->surat_keterangan_lahir;

            Storage::delete($fileTujuan.$currentSkl);
            $akta->surat_keterangan_lahir = $suratKeteranganLahirName;
            $akta->save();
            $suratKeteranganLahir->storeAs($fileTujuan, $suratKeteranganLahirName);
        }
        
        if($request->hasFile('kartu_keluarga')) {
            $kartuKeluarga = $request->file('kartu_keluarga');
            $kartuKeluargaName = $kartuKeluarga->getClientOriginalName();
            $currentKk = $akta->kartu_keluarga;

            Storage::delete($fileTujuan.$currentKk);
            $akta->kartu_keluarga = $kartuKeluargaName;
            $akta->save();
            $kartuKeluarga->storeAs($fileTujuan, $kartuKeluargaName);
        }
        
        if($request->hasFile('keterangan_akta_orang_tua')) {
            $keteranganAktaOrtu = $request->file('keterangan_akta_orang_tua');
            $keteranganAktaOrtuName = $keteranganAktaOrtu->getClientOriginalName();
            $currentAon = $akta->keterangan_akta_orang_tua;

            Storage::delete($fileTujuan.$currentAon);
            $akta->keterangan_akta_orang_tua = $keteranganAktaOrtuName;
            $akta->save();
            $keteranganAktaOrtu->storeAs($fileTujuan, $keteranganAktaOrtuName);
        }

        if($request->hasFile('sptjm_pasutri')) {
            $sptjmPasutri = $request->file('sptjm_pasutri');
            $sptjmPasutriName = $sptjmPasutri->getClientOriginalName();
            $currentSptjmpasutri = $akta->sptjm_pasutri;

            Storage::delete($fileTujuan.$currentSptjmpasutri);
            $akta->sptjm_pasutri = $sptjmPasutriName;
            $akta->save();
            $sptjmPasutri->storeAs($fileTujuan, $sptjmPasutriName);
        }

        if($request->hasFile('keterangan_permohonan_kelahiran')) {
            $keteranganPermohonanKelahiran = $request->file('keterangan_permohonan_kelahiran');
            $keteranganPermohonanKelahiranName = $keteranganPermohonanKelahiran->getClientOriginalName();
            $currentPk = $akta->keterangan_permohonan_kelahiran;

            Storage::delete($fileTujuan.$currentPk);
            $akta->keterangan_permohonan_kelahiran = $keteranganPermohonanKelahiranName;
            $akta->save();
            $keteranganPermohonanKelahiran->storeAs($fileTujuan, $keteranganPermohonanKelahiranName);
        }

        if($request->hasFile('sptjm_kebenaran_kelahiran')) {
            $sptjmKebenaranKelahiran = $request->file('sptjm_kebenaran_kelahiran');
            $sptjmKebenaranKelahiranName = $sptjmKebenaranKelahiran->getClientOriginalName();
            $currentKebenaranKelahiran = $akta->sptjm_kebenaran_kelahiran;

            Storage::delete($fileTujuan.$currentKebenaranKelahiran);
            $akta->sptjm_kebenaran_kelahiran = $sptjmKebenaranKelahiranName;
            $akta->save();
            $sptjmKebenaranKelahiran->storeAs($fileTujuan, $sptjmKebenaranKelahiranName);
        }

        if($request->hasFile('keterangan_anak_kawin')) {
            $keteranganAnakKawin = $request->file('keterangan_anak_kawin');
            $keteranganAnakKawinName = $keteranganAnakKawin->getClientOriginalName();
            $currentAnakKawin = $akta->keterangan_anak_kawin;

            Storage::delete($fileTujuan.$currentAnakKawin);
            $akta->keterangan_anak_kawin = $keteranganAnakKawinName;
            $akta->save();
            $keteranganAnakKawin->storeAs($fileTujuan, $keteranganAnakKawinName);
        }

        if($request->hasFile('pernyataan_saksi')) {
            $pernyataanSaksi = $request->file('pernyataan_saksi');
            $pernyataanSaksiName = $pernyataanSaksi->getClientOriginalName();
            $currentSaksi = $akta->pernyataan_saksi;

            Storage::delete($fileTujuan.$currentSaksi);
            $akta->pernyataan_saksi = $pernyataanSaksiName;
            $akta->save();
            $pernyataanSaksi->storeAs($fileTujuan, $pernyataanSaksiName);
        }

        if($request->hasFile('ktp_saksi_balikpapan')) {
            $ktpSaksiBpn = $request->file('ktp_saksi_balikpapan');
            $ktpSaksiBpnName = $ktpSaksiBpn->getClientOriginalName();
            $currentKtpSaksi = $akta->ktp_saksi_balikpapan;

            Storage::delete($fileTujuan.$currentKtpSaksi);
            $akta->ktp_saksi_balikpapan = $ktpSaksiBpnName;
            $akta->save();
            $ktpSaksiBpn->storeAs($fileTujuan, $ktpSaksiBpnName);
        }

        if($request->hasFile('surat_kuasa')) {
            $suratKuasa = $request->file('surat_kuasa');
            $suratKuasaName = $suratKuasa->getClientOriginalName();
            $currentKuasa = $akta->surat_kuasa;

            Storage::delete($fileTujuan.$currentKuasa);
            $akta->surat_kuasa = $suratKuasaName;
            $akta->save();
            $suratKuasa->storeAs($fileTujuan, $suratKuasaName);
        }

        if($request->hasFile('fotocopy_akta_anak')) {
            $fotocopyAktaAnak = $request->file('fotocopy_akta_anak');
            $fotocopyAktaAnakName = $fotocopyAktaAnak->getClientOriginalName();
            $currentAktaAnak = $akta->fotocopy_akta_anak;

            Storage::delete($fileTujuan.$currentAktaAnak);
            $akta->fotocopy_akta_anak = $fotocopyAktaAnakName;
            $akta->save();
            $fotocopyAktaAnak->storeAs($fileTujuan, $fotocopyAktaAnakName);
        }

        $akta->update($data);

        return redirect('akta-kelahiran')->with('update', 'Data akta kelahiran berhasil diperbaiki');
    }
}
