@extends('layout.master')

@section('title', 'Akta Kelahiran')

@section('content')

<div class="row">
    <div class="col s12">
        <div class="card">

            <div class="card-content">

                <div class="row">
                    <a href="{{url('operator/akta-kelahiran')}}" class="waves-effect waves-light btn red left"><i
                            class="material-icons left">keyboard_backspace</i></a>
                </div>
                
                <span class="card-title">Akta Kelahiran {{$akta->nama_anak}} </span>
                <blockquote>
                    Data Bayi
                </blockquote>
                <hr>

                <form action="{{url('operator/akta-kelahiran/'.$akta->id)}}" method="POST">
                    @method('put')
                    @csrf
                {{-- 1 --}}
               {{-- 1 --}}
               <div class="row" style="margin-top: 20px">
                            
                <div class="input-field col s3">
                    <input id="nama_anak" type="text" class="validate" name="nama_anak" value="{{old('nama_anak', $akta->nama_anak)}}">
                    <label for="nama_anak">Nama Anak*</label>
                    <span class="helper-text">Nama Anak</span>
                    @error('nama_anak')
                        <span class="helper-text red-text">{{ $message }}</span>
                    @enderror
                </div>

                <div class="input-field col s3">
                    <input id="tempat_kelahiran" type="text" class="validate" name="tempat_kelahiran" value="{{old('tempat_kelahiran', $akta->tempat_kelahiran)}}">
                    <label for="tempat_kelahiran">Tempat Kelahiran*</label>
                    <span class="helper-text">Tempat Kelahiran, cth: Balikpapan</span>
                    @error('tempat_kelahiran')
                        <span class="helper-text red-text">{{ $message }}</span>
                    @enderror
                </div>

                <div class="input-field col s3">
                    <input id="kelahiran" type="text" class="validate" name="kelahiran" value="{{old('kelahiran' , $akta->kelahiran)}}">
                    <label for="kelahiran">Kelahiran ke*</label>
                    <span class="helper-text">Cth: 1</span>
                    @error('kelahiran')
                        <span class="helper-text red-text">{{ $message }}</span>
                    @enderror
                </div>

                <div class="input-field col s3">
                    <select id="select" name="tempat_dilahirkan">
                        <option value="" disabled selected> Tempat Dilahirkan*</option>
                        <option value="Rumah Sakit" {{ old('tempat_dilahirkan', $akta->tempat_dilahirkan) == "Rumah Sakit" ? 'selected' : '' }}>Rumah Sakit</option>
                        <option value="Puskesmas" {{ old('tempat_dilahirkan', $akta->tempat_dilahirkan) == "Puskesmas" ? 'selected' : '' }}>Puskesmas</option>
                        <option value="Rumah" {{ old('tempat_dilahirkan', $akta->tempat_dilahirkan) == "Rumah" ? 'selected' : '' }}>Rumah</option>
                        <option value="Lainnya" {{ old('tempat_dilahirkan', $akta->tempat_dilahirkan) == "Lainnya" ? 'selected' : '' }}>Lainnya</option>
                    </select>
                    <span class="helper-text">Tempat dilahirkan</span>
                    @error('tempat_dilahirkan')
                        <span class="helper-text red-text">{{ $message }}</span>
                    @enderror
                </div>

            </div>

            {{-- 2 --}}
            <div class="row" style="margin-top: 30px">

                <div class="input-field col s3">
                    <input id="tanggal_lahir" type="text" class="datepicker" name="tanggal_lahir" value="{{old('tanggal_lahir', $akta->tanggal_lahir)}}">
                    <label for="tanggal_lahir">Tanggal Lahir*</label>
                    <span class="helper-text left-align">Tanggal lahir bayi.</span>
                    @error('tanggal_lahir')
                        <span class="helper-text red-text">{{ $message }}</span>
                    @enderror
                </div>

                <div class="input-field col s3">
                    <select name="penolong_kelahiran">
                        <option disabled selected>Penolong Kelahiran*</option>
                        <option value="Dokter" {{ old('penolong_kelahiran', $akta->penolong_kelahiran) == "Dokter" ? 'selected' : '' }}>Dokter</option>
                        <option value="Bidan/perawat" {{ old('penolong_kelahiran', $akta->penolong_kelahiran) == "Bidan/perawat" ? 'selected' : '' }}>Bidan/Perawat</option>
                        <option value="Dukun" {{ old('penolong_kelahiran', $akta->penolong_kelahiran) == "Dukun" ? 'selected' : '' }}>Dukun</option>
                        <option value="Lainnya" {{ old('penolong_kelahiran', $akta->penolong_kelahiran) == "Lainnya" ? 'selected' : '' }}>Lainnya</option>
                    </select>
                    <span class="helper-text left-align">Penolong Kelahiran</span>
                    @error('penolong_kelahiran')
                        <span class="helper-text red-text">{{ $message }}</span>
                    @enderror
                </div>

                <div class="input-field col s3">
                    <input id="nama_kepala_keluarga" type="text" class="validate" name="nama_kepala_keluarga" value="{{old('nama_kepala_keluarga', $akta->nama_kepala_keluarga)}}">
                    <label for="nama_kepala_keluarga">Nama Kepala Keluarga*</label>
                    <span class="helper-text">Nama Kepala Keluarga</span>
                    @error('nama_kepala_keluarga')
                        <span class="helper-text red-text">{{ $message }}</span>
                    @enderror
                </div>

                <div class="input-field col s3">
                    <select id="select" name="jenis_kelahiran">
                        <option value="" disabled selected> Jenis Kelahiran*</option>
                        <option value="Tunggal" {{ old('jenis_kelahiran', $akta->jenis_kelahiran) == "Tunggal" ? 'selected' : '' }}>Tunggal</option>
                        <option value="Kembar 1" {{ old('jenis_kelahiran', $akta->jenis_kelahiran) == "Kembar 1" ? 'selected' : '' }}>Kembar 1</option>
                        <option value="Lainnya" {{ old('jenis_kelahiran', $akta->jenis_kelahiran) == "Lainnya" ? 'selected' : '' }}>Rumah</option>
                    </select>
                    <span class="helper-text">Jenis Kelahiran</span>
                    @error('jenis_kelahiran')
                        <span class="helper-text red-text">{{ $message }}</span>
                    @enderror
                </div>
            </div>

            {{-- 3 --}}
            <div class="row" style="margin-top: 30px">
                <div class="input-field col s3">
                    <select id="select" name="jenis_kelamin">
                        <option value="" disabled selected> Pilih Jenis Kelamin</option>
                        <option value="Laki-Laki" {{ old('jenis_kelamin', $akta->jenis_kelamin) == "Laki-Laki" ? 'selected' : '' }}>Laki-laki</option>
                        <option value="Wanita" {{ old('jenis_kelamin', $akta->jenis_kelamin) == "Wanita" ? 'selected' : '' }}>Wanita</option>
                    </select>
                    <span class="helper-text">Jenis Kelamin</span>
                    @error('jenis_kelamin')
                        <span class="helper-text red-text">{{ $message }}</span>
                    @enderror
                </div>

                <div class="input-field col s3">
                    <input id="waktu_lahir" type="text" class="timepicker" name="waktu_lahir" value="{{old('waktu_lahir', $akta->waktu_lahir)}}">
                    <label for="waktu_lahir">Waktu Lahir*</label>
                    <span class="helper-text left-align">Waktu Lahir</span>
                    @error('waktu_lahir')
                        <span class="helper-text red-text">{{ $message }}</span>
                    @enderror
                </div>

                <div class="input-field col s3">
                    <input id="berat_bayi" type="number" class="validate" name="berat_bayi" value="{{old('berat_bayi', $akta->berat_bayi)}}">
                    <label for="berat_bayi">Berat Bayi*</label>
                    <span class="helper-text">Berat bayi dalam kilogram</span>
                    @error('berat_bayi')
                        <span class="helper-text red-text">{{ $message }}</span>
                    @enderror
                </div>

                <div class="input-field col s3">
                    <input id="no_hp" type="number" class="validate" name="no_hp" value="{{old('no_hp', $akta->no_hp)}}">
                    <label for="no_hp">Nomor Handphone*</label>
                    <span class="helper-text">Nomor Handphone</span>
                    @error('no_hp')
                        <span class="helper-text red-text">{{ $message }}</span>
                    @enderror
                </div>
            </div>

            {{-- 4 --}}
            <div class="row" style="margin-top: 30px;">
            

                <div class="input-field col s3">
                    <input id="tinggi_bayi" type="number" class="validate" name="tinggi_bayi" value="{{old('tinggi_bayi', $akta->tinggi_bayi)}}">
                    <label for="tinggi_bayi">Tinggi Bayi*</label>
                    <span class="helper-text">Tinggi Bayi dalam cm</span>
                    @error('tinggi_bayi')
                        <span class="helper-text red-text">{{ $message }}</span>
                    @enderror
                </div>

                <div class="input-field col s3">
                    <select id="select" name="warga_negara">
                        <option value="" disabled selected> Warga Negara*</option>
                        <option value="WNI" {{ old('warga_negara', $akta->warga_negara) == "WNI" ? 'selected' : '' }}>WNI</option>
                        <option value="WNA" {{ old('warga_negara', $akta->warga_negara) == "WNA" ? 'selected' : '' }}>WNA</option>
                    </select>
                    <span class="helper-text">Warga negara wni/wna</span>
                    @error('warga_negara')
                        <span class="helper-text red-text">{{ $message }}</span>
                    @enderror
                </div>
            </div>

            <blockquote style="margin-top: 30px">
                Keterangan data yang dimohonkan
            </blockquote>
            <hr>
            {{-- 1 --}}
            <div class="row" style="margin-top: 20px">
                <div class="input-field col s3">
                    <input id="nik_ayah" type="number" class="validate" name="nik_ayah" value="{{old('nik_ayah', $akta->nik_ayah)}}">
                    <label for="nik_ayah">NIK Ayah</label>
                    <span class="helper-text" data-error="Isi nama anda" data-success="Nama ok">Nomor Induk
                        Keluarga Ayah</span>
                        @error('nik_ayah')
                        <span class="helper-text red-text">{{ $message }}</span>
                    @enderror
                </div>

                <div class="input-field col s3">
                    <input id="pekerjaan_ayah" type="text" class="validate" name="pekerjaan_ayah" value="{{old('pekerjaan_ayah', $akta->pekerjaan_ayah)}}">
                    <label for="pekerjaan_ayah">Pekerjaan Ayah</label>
                    <span class="helper-text">Pekerjaan Ayah, cth: Swasta</span>
                    @error('pekerjaan_ayah')
                        <span class="helper-text red-text">{{ $message }}</span>
                    @enderror
                </div>

                <div class="input-field col s3">
                    <input id="alamat" type="text" class="validate" name="alamat_ayah" value="{{old('alamat_ayah', $akta->alamat_ayah)}}">
                    <label for="alamat">Alamat</label>
                    <span class="helper-text">Alamat tempat tinggal</span>
                    @error('alamat_ayah')
                        <span class="helper-text red-text">{{ $message }}</span>
                    @enderror
                </div>

                <div class="input-field col s3">
                    <input id="nomor_surat_kawin" type="number" class="validate" name="nomor_surat_kawin" value="{{old('nomor_surat_kawin', $akta->nomor_surat_kawin)}}">
                    <label for="nomor_surat_kawin">Nomor Surat Kawin</label>
                    <span class="helper-text">Nomor Surat Kawin</span>
                </div>
                @error('nomor_surat_kawin')
                        <span class="helper-text red-text">{{ $message }}</span>
                    @enderror
            </div>

            {{-- 2 --}}
            <div class="row" style="margin-top: 20px">
                <div class="input-field col s3">
                    <input id="nama_ayah" type="text" class="validate" name="nama_ayah" value="{{old('nama_ayah', $akta->nama_ayah)}}">
                    <label for="nama_ayah">Nama Ayah</label>
                    <span class="helper-text">Nama Ayah</span>
                    @error('nama_ayah')
                        <span class="helper-text red-text">{{ $message }}</span>
                    @enderror
                </div>

                <div class="input-field col s3">
                    <select id="select" name="warga_negara_ayah">
                        <option value="" disabled selected> Warga Negara Ayah*</option>
                        <option value="WNI" {{ old('warga_negara_ayah', $akta->warga_negara_ayah) == "WNI" ? 'selected' : '' }}>WNI</option>
                        <option value="WNA" {{ old('warga_negara_ayah', $akta->warga_negara_ayah) == "WNA" ? 'selected' : '' }}>WNA</option>
                    </select>
                    <span class="helper-text">Warga negara ayah, wni/wna</span>
                    @error('warga_negara_ayah')
                        <span class="helper-text red-text">{{ $message }}</span>
                    @enderror
                </div>

                <div class="input-field col s3">
                    <select id="select" name="status_perkawinan">
                        <option value="" disabled selected> Status Perkawinan*</option>
                        <option value="Sah" {{ old('status_perkawinan', $akta->status_perkawinan) == "Sah" ? 'selected' : '' }}>Sah</option>
                        <option value="Tidak sah" {{ old('status_perkawinan', $akta->status_perkawinan) == "Tidak Sah" ? 'selected' : '' }}>Tidak sah</option>
                    </select>
                    <span class="helper-text">Status perkawinan</span>
                    @error('status_perkawinan')
                        <span class="helper-text red-text">{{ $message }}</span>
                    @enderror
                </div>

                <div class="input-field col s3">
                    <input id="nomor_kk" type="number" class="validate" name="nomor_kk" value="{{old('nomor_kk', $akta->nomor_kk)}}">
                    <label for="nomor_kk">Nomor KK*</label>
                    <span class="helper-text">Nomor Kartu Keluarga</span>
                    @error('nomor_kk')
                        <span class="helper-text red-text">{{ $message }}</span>
                    @enderror
                </div>

            </div>

            {{-- 3 --}}
            <div class="row" style="margin-top: 20px">
                <div class="input-field col s3">
                    <input id="nik_ibu" type="number" class="validate" name="nik_ibu" value="{{old('nik_ibu', $akta->nik_ibu)}}">
                    <label for="nik_ibu">NIK Ibu</label>
                    <span class="helper-text">Nomor Induk
                        Keluarga Ibu</span>
                        @error('nik_ibu')
                        <span class="helper-text red-text">{{ $message }}</span>
                    @enderror
                </div>

                <div class="input-field col s3">
                    <input id="pekerjaan_ibu" type="text" class="validate" name="pekerjaan_ibu" value="{{old('pekerjaan_ibu', $akta->pekerjaan_ibu)}}">
                    <label for="pekerjaan_ibu">Pekerjaan Ibu*</label>
                    <span class="helper-text">Pekerjaan Ibu, cth: IRT</span>
                    @error('pekerjaan_ibu')
                        <span class="helper-text red-text">{{ $message }}</span>
                    @enderror
                </div>

                <div class="input-field col s3">
                    <input id="agama" type="text" class="validate" name="agama" value="{{old('agama', $akta->agama)}}">
                    <label for="agama">Agama</label>
                    <span class="helper-text">Agama</span>
                    @error('agama')
                        <span class="helper-text red-text">{{ $message }}</span>
                    @enderror
                </div>

            </div>

            {{-- 4 --}}
            <div class="row" style="margin-top: 20px">
                <div class="input-field col s3">
                    <input id="nama_ibu" type="text" class="validate" name="nama_ibu" value="{{old('nama_ibu', $akta->nama_ibu)}}">
                    <label for="nama_ibu">Nama Ibu</label>
                    <span class="helper-text">Nama Ibu</span>
                    @error('nama_ibu')
                        <span class="helper-text red-text">{{ $message }}</span>
                    @enderror
                </div>

                <div class="input-field col s3">
                    <select id="select" name="warga_negara_ibu">
                        <option value="" disabled selected> Warga Negara Ibu*</option>
                        <option value="WNI" {{ old('warga_negara_ibu', $akta->warga_negara_ibu) == "WNI" ? 'selected' : '' }}>WNI</option>
                        <option value="WNA" {{ old('warga_negara_ibu', $akta->warga_negara_ibu) == "WNI" ? 'selected' : '' }}>WNA</option>
                    </select>
                    <span class="helper-text">Warga negara ibu, wni/wna</span>
                    @error('warga_negara_ibu')
                        <span class="helper-text red-text">{{ $message }}</span>
                    @enderror
                </div>

                <div class="input-field col s3">
                    <input id="tanggal_perkawinan" type="text" class="datepicker" name="tanggal_perkawinan" value="{{old('tanggal_perkawinan', $akta->tanggal_perkawinan)}}">
                    <label for="tanggal_perkawinan">Tanggal Perkawinan*</label>
                    <span class="helper-text left-align">Tanggal Perkawinan</span>
                    @error('tanggal_perkawinan')
                        <span class="helper-text red-text">{{ $message }}</span>
                    @enderror
                </div>

            </div>

            <blockquote style="margin-top: 30px">
                Keterangan saksi
            </blockquote>
            <hr>

            <div class="row" style="margin-top: 20px">
                <div class="input-field col s3">
                    <input id="nik_saksi_1" type="number" class="validate" name="nik_saksi_1" value="{{old('nik_saksi_1', $akta->nik_saksi_1)}}">
                    <label for="nik_saksi_1">NIK Saksi 1*</label>
                    <span class="helper-text">Nomor Induk
                        Keluarga Saksi 1</span>
                        @error('nik_saksi_1')
                        <span class="helper-text red-text">{{ $message }}</span>
                    @enderror
                </div>

                <div class="input-field col s3">
                    <input id="umur_saksi_1" type="number" class="validate" name="umur_saksi_1" value="{{old('umur_saksi_1', $akta->umur_saksi_1)}}">
                    <label for="umur_saksi_1">Umur Saksi 1*</label>
                    <span class="helper-text">Umur Saksi 1</span>
                    @error('umur_saksi_1')
                        <span class="helper-text red-text">{{ $message }}</span>
                    @enderror
                </div>

                <div class="input-field col s6">
                    <input id="alamat_saksi_1" type="text" class="validate" name="alamat_saksi_1" value="{{old('alamat_saksi_1', $akta->alamat_saksi_1)}}">
                    <label for="alamat_saksi_1">Alamat Saksi 1</label>
                    <span class="helper-text">Alamat Saksi 1</span>
                    @error('alamat_saksi_1')
                        <span class="helper-text red-text">{{ $message }}</span>
                    @enderror
                </div>

            </div>

            <div class="row" style="margin-top: 20px">
                <div class="input-field col s3">
                    <input id="nik_saksi_2" type="number" class="validate" name="nik_saksi_2" value="{{old('nik_saksi_2', $akta->nik_saksi_2)}}">
                    <label for="nik_saksi_2">NIK Saksi 2</label>
                    <span class="helper-text">Nomor Induk
                        Keluarga Saksi 1</span>
                        @error('nik_saksi_2')
                        <span class="helper-text red-text">{{ $message }}</span>
                    @enderror
                </div>

                <div class="input-field col s3">
                    <input id="umur_saksi_2" type="number" class="validate" name="umur_saksi_2" value="{{old('umur_saksi_2', $akta->umur_saksi_2)}}">
                    <label for="umur_saksi_2">Umur Saksi 2</label>
                    <span class="helper-text">Umur Saksi 2</span>
                    @error('umur_saksi_2')
                        <span class="helper-text red-text">{{ $message }}</span>
                    @enderror
                </div>

                <div class="input-field col s6">
                    <input id="alamat_saksi_2" type="text" class="validate" name="alamat_saksi_2" value="{{old('alamat_saksi_2', $akta->alamat_saksi_2)}}">
                    <label for="alamat_saksi_2">Alamat Saksi 2</label>
                    <span class="helper-text">Alamat Saksi 2</span>
                    @error('alamat_saksi_2')
                        <span class="helper-text red-text">{{ $message }}</span>
                    @enderror
                </div>

            </div>

            <div class="row" style="margin-top: 20px">
                <div class="input-field col s3">
                    <input id="nama_saksi_1" type="text" class="validate" name="nama_saksi_1" value="{{old('nama_saksi_1', $akta->nama_saksi_1)}}">
                    <label for="nama_saksi_1">Nama Saksi 1*</label>
                    <span class="helper-text">Nama Saksi 1</span>
                    @error('nama_saksi_1')
                        <span class="helper-text red-text">{{ $message }}</span>
                    @enderror
                </div>

                <div class="input-field col s3">
                    <input id="pekerjaan_saksi_1" type="text" class="validate" name="pekerjaan_saksi_1" value="{{old('pekerjaan_saksi_1', $akta->pekerjaan_saksi_1)}}">
                    <label for="pekerjaan_saksi_1">Pekerjaan Saksi 1*</label>
                    <span class="helper-text">Pekerjaan Saksi 1</span>
                    @error('pekerjaan_saksi_1')
                        <span class="helper-text red-text">{{ $message }}</span>
                    @enderror
                </div>

            </div>

            <div class="row" style="margin-top: 20px">
                <div class="input-field col s3">
                    <input id="nama_saksi_2" type="text" class="validate" name="nama_saksi_2" value="{{old('nama_saksi_2', $akta->nama_saksi_2)}}">
                    <label for="nama_saksi_2">Nama Saksi 2</label>
                    <span class="helper-text">Nama Saksi 2</span>
                    @error('nama_saksi_2')
                        <span class="helper-text red-text">{{ $message }}</span>
                    @enderror
                </div>

                <div class="input-field col s3">
                    <input id="pekerjaan_saksi_2" type="text" class="validate" name="pekerjaan_saksi_2" value="{{old('pekerjaan_saksi_2', $akta->pekerjaan_saksi_2)}}">
                    <label for="pekerjaan_saksi_2">Pekerjaan Saksi 2</label>
                    <span class="helper-text">Pekerjaan Saksi 2</span>
                    @error('pekerjaan_saksi_2')
                        <span class="helper-text red-text">{{ $message }}</span>
                    @enderror
                </div>

            </div>

                <blockquote style="margin-top: 30px">
                    Lampiran Surat Keterangan <br>
                    Telah diupload dengan format file pdf.
                </blockquote>
                <hr>

                <div class="row" style="margin-top: 30px">
                    <div class="file-field input-field col s6" style="margin:0px">
                        <p>Surat Keterangan Lahir:</p> <a href="{{url('operator/akta-kelahiran/'.$akta->id.'/open-pdf?pdf='.$akta->surat_keterangan_lahir)}}" target="_blank">{{$akta->surat_keterangan_lahir}}</a>
                    </div>

                    <div class="file-field input-field col s6" style="margin:0px">
                        <p>Kartu Keluarga:</p> <a href="{{url('operator/akta-kelahiran/'.$akta->id.'/open-pdf?pdf='.$akta->kartu_keluarga)}}" target="_blank">{{$akta->kartu_keluarga}}</a>
                    </div>
                </div>

                <div class="row" style="margin-top: 30px">
                    <div class="file-field input-field col s6" style="margin:0px">
                        <p>Keterangan Akta Orang Tua:</p> <a href="{{url('operator/akta-kelahiran/'.$akta->id.'/open-pdf?pdf='.$akta->keterangan_akta_orang_tua)}}" target="_blank">{{$akta->keterangan_akta_orang_tua}}</a>
                    </div>

                    <div class="file-field input-field col s6" style="margin:0px">
                        <p>SPTJM Pasutri:</p> <a href="{{url('operator/akta-kelahiran/'.$akta->id.'/open-pdf?pdf='.$akta->sptjm_pasutri)}}" target="_blank">{{$akta->sptjm_pasutri}}</a>
                    </div>
                </div>

                <div class="row" style="margin-top: 30px">
                    <div class="file-field input-field col s6" style="margin:0px">
                        <p>Keterangan Permohonan Kelahiran:</p> <a
                            href="{{url('operator/akta-kelahiran/'.$akta->id.'/open-pdf?pdf='.$akta->keterangan_permohonan_kelahiran)}}" target="_blank">{{$akta->keterangan_permohonan_kelahiran}}</a>
                    </div>

                    <div class="file-field input-field col s6" style="margin:0px">
                        <p>SPTJM Kebenaran Kelahiran:</p> <a href="{{url('operator/akta-kelahiran/'.$akta->id.'/open-pdf?pdf='.$akta->sptjm_kebenaran_kelahiran)}}" target="_blank">{{$akta->sptjm_kebenaran_kelahiran}}</a>
                    </div>
                </div>

                <div class="row" style="margin-top: 30px">
                    <div class="file-field input-field col s6" style="margin:0px">
                        <p>Keterangan Anak Kawin:</p> <a href="{{url('operator/akta-kelahiran/'.$akta->id.'/open-pdf?pdf='.$akta->keterangan_anak_kawin)}}" target="_blank">{{$akta->keterangan_anak_kawin}}</a>
                    </div>

                    <div class="file-field input-field col s6" style="margin:0px">
                        <p>Pernyataan Saksi:</p> <a href="{{url('operator/akta-kelahiran/'.$akta->id.'/open-pdf?pdf='.$akta->pernyataan_saksi)}}" target="_blank">{{$akta->pernyataan_saksi}}</a>
                    </div>
                </div>

                <div class="row" style="margin-top: 30px">
                    <div class="file-field input-field col s6" style="margin:0px">
                        <p>KTP Saksi Kelahiran(Balikpapan):</p> <a href="{{url('operator/akta-kelahiran/'.$akta->id.'/open-pdf?pdf='.$akta->ktp_saksi_balikpapan)}}" target="_blank">{{$akta->ktp_saksi_balikpapan}}</a>
                    </div>

                    <div class="file-field input-field col s6" style="margin:0px">
                        <p>Surat Kuasa(Jika Diwakilkan):</p> <a href="{{url('operator/akta-kelahiran/'.$akta->id.'/open-pdf?pdf='.$akta->surat_kuasa)}}" target="_blank">{{$akta->surat_kuasa}}</a>
                    </div>
                </div>

                <div class="row" style="margin-top: 30px">
                    <div class="file-field input-field col s6" style="margin:0px">
                        <p>Fotocopy Akta Anak Sebelumnya (jika anak kedua):</p> <a
                            href="{{url('operator/akta-kelahiran/'.$akta->id.'/open-pdf?pdf='.$akta->fotocopy_akta_anak)}}" target="_blank">{{$akta->fotocopy_akta_anak}}</a>
                    </div>
                </div>

            </div>

        </div>

        <div class="card">
            <div class="card-content">
                <span class="card-title">Review <button data-target="modal1"
                    class="waves-effect waves-light orange btn-small tooltipped btn modal-trigger right review"
                    data-position="top" data-tooltip="Hasil Review">Hasil Review Sebelumnya<i
                        class="material-icons right">history</i></button></span>

                {{-- modal --}}
                <div id="modal1" class="modal">
                    <div class="modal-content">
                        <h4>Hasil Review</h4>
                        @isset($akta->review_operator)
                        <div class="card">
                            <div class="card-content">
                                <p>Review Operator: @if ($akta->status_operator == 1)
                                    <span class="new badge orange right" data-badge-caption="Diproses"></span>
                                    @elseif($akta->status_operator == 2)
                                    <span class="new badge red right" data-badge-caption="Ditolak"></span>
                                    @else
                                    <span class="new badge green right" data-badge-caption="Disetujui"></span>
                                    @endif</p>
                                <p>{{$akta->review_operator}}</p>
                            </div>
                        </div>
                        @endisset

                        @isset($akta->review_kasie)
                        <div class="card">
                            <div class="card-content">
                                <p>Review Kasie: @if ($akta->status_kasie == 1)
                                    <span class="new badge orange right" data-badge-caption="Diproses"></span>
                                    @elseif($akta->status_kasie == 2)
                                    <span class="new badge red right" data-badge-caption="Ditolak"></span>
                                    @else
                                    <span class="new badge green right" data-badge-caption="Disetujui"></span>
                                    @endif</p>
                                <p>{{$akta->review_kasie}}</p>
                            </div>
                        </div>
                        @endisset

                    </div>
                    <div class="modal-footer">
                        <a href="#!" class="modal-close waves-effect waves-green btn red">Cancel</a>
                    </div>
                </div>

                    <div class="row">
                        <div class="input-field col s12">
                            <textarea id="textarea2" class="materialize-textarea" name="review_operator" required></textarea>
                            <label for="textarea2">Review:</label>
                            <span class="helper-text">Berikan review untuk akta kelahiran ini.</span>
                        </div>
                    </div>


                    <label style="margin-right: 8px">
                        <input name="status_operator" type="radio" value="3" required/>
                        <span>Setuju</span>
                    </label>

                    <label>
                        <input name="status_operator" type="radio" value="2" required/>
                        <span>Tolak</span>
                    </label>
                    
                    <div class="row" style="margin-top: 30px; margin-bottom:0px">
                        <div class="col s12">
                            <button class="waves-effect waves-light btn right" type="submit">Simpan</button>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>

@endsection

@section('javascript')
<script>
    document.addEventListener('DOMContentLoaded', function () {
        var elems = document.querySelectorAll('select');
        var instances = M.FormSelect.init(elems);
    });

    document.addEventListener('DOMContentLoaded', function() {
        var currYear = (new Date()).getFullYear();
        var elems = document.querySelectorAll('.datepicker');

        var instances = M.Datepicker.init(elems, {
            defaultDate: new Date(currYear,1,31),
            maxDate: new Date(currYear,12,31),
            yearRange: [1930, currYear], 
        });
    });

    document.addEventListener('DOMContentLoaded', function() {
        var elems = document.querySelectorAll('.timepicker');
        var instances = M.Timepicker.init(elems);
    });

    document.addEventListener('DOMContentLoaded', function() {
        var elems = document.querySelectorAll('.modal');
        console.log(elems);
        var instances = M.Modal.init(elems);
    });
</script>
@endsection