@extends('layout.master')

@section('title', 'Akta Kelahiran')

@section('content')

<div class="row">
    <div class="col s12">
        <div class="card">

            <div class="card-content">

                <div class="row">
                    <a href="{{url('kasie/akta-kelahiran')}}" class="waves-effect waves-light btn red left"><i
                            class="material-icons left">keyboard_backspace</i></a>
                </div>

                <span class="card-title">Akta Kelahiran {{$akta->nama_anak}} </span>
                <blockquote>
                    Data Bayi
                </blockquote>
                <hr>

                {{-- 1 --}}
                <div class="row" style="margin-top: 20px">
                    <div class="input-field col s3">
                        <input id="nama_anak" type="text" class="validate" name="nama_anak" value="{{$akta->nama_anak}}"
                            disabled>
                        <label for="nama_anak">Nama Anak*</label>
                        <span class="helper-text">Nama Anak</span>
                    </div>

                    <div class="input-field col s3">
                        <input id="tempat_kelahiran" type="text" class="validate" name="tempat_kelahiran"
                            value="{{$akta->tempat_kelahiran}}" disabled>
                        <label for="tempat_kelahiran">Tempat Kelahiran*</label>
                        <span class="helper-text">Tempat Kelahiran, contoh: Balikpapan</span>
                    </div>

                    <div class="input-field col s3">
                        <input id="kelahiran" type="text" class="validate" name="kelahiran" value="{{$akta->kelahiran}}"
                            disabled>
                        <label for="kelahiran">Kelahiran ke*</label>
                        <span class="helper-text">contoh: 1</span>
                    </div>

                    <div class="input-field col s3">
                        <select id="select" name="tempat_dilahirkan" disabled>
                            <option disabled selected> {{$akta->tempat_dilahirkan}}</option>
                        </select>
                        <span class="helper-text">Tempat dilahirkan</span>
                    </div>

                </div>

                {{-- 2 --}}
                <div class="row" style="margin-top: 30px">


                    <div class="input-field col s3">
                        <input id="tanggal_lahir" type="text" class="datepicker" name="tanggal_lahir"
                            value="{{$akta->tanggal_lahir}}" disabled>
                        <label for="tanggal_lahir">Tanggal Lahir*</label>
                        <span class="helper-text left-align">Tanggal lahir bayi.</span>
                    </div>

                    <div class="input-field col s3">
                        <select name="penolong_kelahiran" disabled>
                            <option disabled selected>{{$akta->penolong_kelahiran}}</option>
                        </select>
                        <span class="helper-text left-align">Penolong Kelahiran</span>
                    </div>

                    <div class="input-field col s3">
                        <input id="nama_kepala_keluarga" type="text" class="validate" name="nama_kepala_keluarga"
                            value="{{$akta->nama_kepala_keluarga}}" disabled>
                        <label for="nama_kepala_keluarga">Nama Kepala Keluarga*</label>
                        <span class="helper-text">Nama Kepala Keluarga</span>
                    </div>

                    
                    <div class="input-field col s3">
                        <select id="select" name="jenis_kelahiran" disabled>
                            <option disabled selected> {{$akta->jenis_kelahiran}}</option>
                        </select>
                        <span class="helper-text">Jenis Kelahiran</span>
                    </div>
                </div>

                {{-- 3 --}}
                <div class="row" style="margin-top: 30px">
                    <div class="input-field col s3">
                        <select id="select" name="jenis_kelamin" disabled>
                            <option disabled selected> {{$akta->jenis_kelamin}}</option>
                        </select>
                        <span class="helper-text">Jenis Kelamin</span>
                    </div>

                    <div class="input-field col s3">
                        <input id="waktu_lahir" type="text" class="timepicker" name="waktu_lahir"
                            value="{{$akta->waktu_lahir}}" disabled>
                        <label for="waktu_lahir">Waktu Lahir*</label>
                        <span class="helper-text left-align">Waktu Lahir</span>
                    </div>

                    <div class="input-field col s3">
                        <input id="berat_bayi" type="number" class="validate" name="berat_bayi"
                            value="{{$akta->berat_bayi}}" disabled>
                        <label for="berat_bayi">Berat Bayi*</label>
                        <span class="helper-text">Berat bayi dalam kilogram</span>
                    </div>

                </div>

                {{-- 4 --}}
                <div class="row" style="margin-top: 30px;">

                    <div class="input-field col s3">
                        <input id="tinggi_bayi" type="number" class="validate" name="tinggi_bayi"
                            value="{{$akta->tinggi_bayi}}" disabled>
                        <label for="tinggi_bayi">Tinggi Bayi*</label>
                        <span class="helper-text">Tinggi Bayi dalam cm</span>
                    </div>

                    <div class="input-field col s3">
                        <select id="select" name="warga_negara" disabled>
                            <option disabled selected> {{$akta->warga_negara}}</option>
                        </select>
                        <span class="helper-text">Warga negara wni/wna</span>
                    </div>
                </div>

                <blockquote style="margin-top: 30px">
                    Keterangan data yang dimohonkan
                </blockquote>
                <hr>
                {{-- 1 --}}
                <div class="row" style="margin-top: 20px">
                    <div class="input-field col s3">
                        <input id="nik_ayah" type="number" class="validate" name="nik_ayah" value="{{$akta->nik_ayah}}"
                            disabled>
                        <label for="nik_ayah">NIK Ayah</label>
                        <span class="helper-text" data-error="Isi nama anda" data-success="Input NIK merupakan 16 angka, dan sudah benar">Nomor Induk
                            Keluarga Ayah</span>
                    </div>

                    <div class="input-field col s3">
                        <input id="pekerjaan_ayah" type="text" class="validate" name="pekerjaan_ayah"
                            value="{{$akta->pekerjaan_ayah}}" disabled>
                        <label for="pekerjaan_ayah">Pekerjaan Ayah*</label>
                        <span class="helper-text">Pekerjaan Ayah, contoh: Swasta</span>
                    </div>

                    <div class="input-field col s3">
                        <input id="alamat" type="text" class="validate" name="alamat_ayah"
                            value="{{$akta->alamat_ayah}}" disabled>
                        <label for="alamat">Alamat</label>
                        <span class="helper-text">Alamat tempat tinggal</span>
                    </div>

                    <div class="input-field col s3">
                        <input id="nomor_surat_kawin" type="number" class="validate" name="nomor_surat_kawin"
                            value="{{$akta->nomor_surat_kawin}}" disabled>
                        <label for="nomor_surat_kawin">Nomor Surat Kawin*</label>
                        <span class="helper-text">Nomor Surat Kawin</span>
                    </div>
                </div>

                {{-- 2 --}}
                <div class="row" style="margin-top: 20px">
                    <div class="input-field col s3">
                        <input id="nama_ayah" type="text" class="validate" name="nama_ayah" value="{{$akta->nama_ayah}}"
                            disabled>
                        <label for="nama_ayah">Nama Ayah</label>
                        <span class="helper-text">Nama Ayah</span>
                    </div>

                    <div class="input-field col s3">
                        <select id="select" name="warga_negara_ayah" disabled>
                            <option disabled selected> {{$akta->warga_negara_ayah}}</option>
                        </select>
                        <span class="helper-text">Warga negara ayah, wni/wna</span>
                    </div>

                    <div class="input-field col s3">
                        <select id="select" name="status_perkawinan" disabled>
                            <option value="" disabled selected> {{$akta->status_perkawinan}}</option>
                        </select>
                        <span class="helper-text">Warga negara wni/wna</span>
                    </div>

                    <div class="input-field col s3">
                        <input id="nomor_kk" type="number" class="validate" name="nomor_kk" value="{{$akta->nomor_kk}}"
                            disabled>
                        <label for="nomor_kk">Nomor KK*</label>
                        <span class="helper-text">Nomor Kartu Keluarga</span>
                    </div>

                </div>

                {{-- 3 --}}
                <div class="row" style="margin-top: 20px">
                    <div class="input-field col s3">
                        <input id="nik_ibu" type="number" class="validate" name="nik_ibu" value="{{$akta->nik_ibu}}"
                            disabled>
                        <label for="nik_ibu">NIK Ibu</label>
                        <span class="helper-text">Nomor Induk
                            Keluarga Ibu</span>
                    </div>

                    <div class="input-field col s3">
                        <input id="pekerjaan_ibu" type="text" class="validate" name="pekerjaan_ibu"
                            value="{{$akta->pekerjaan_ibu}}" disabled>
                        <label for="pekerjaan_ibu">Pekerjaan Ibu*</label>
                        <span class="helper-text">Pekerjaan Ibu, contoh: IRT</span>
                    </div>

                    <div class="input-field col s3">
                        <input id="agama" type="text" class="validate" name="agama" value="{{$akta->agama}}" disabled>
                        <label for="agama">Agama</label>
                        <span class="helper-text">Agama</span>
                    </div>

                    <div class="input-field col s3">
                        <input id="no_hp" type="number" class="validate" name="no_hp" value="{{$akta->no_hp}}" disabled>
                        <label for="no_hp">Nomor Handphone*</label>
                        <span class="helper-text">Nomor Handphone</span>
                    </div>

                </div>

                {{-- 4 --}}
                <div class="row" style="margin-top: 20px">
                    <div class="input-field col s3">
                        <input id="nama_ibu" type="text" class="validate" name="nama_ibu" value="{{$akta->nama_ibu}}"
                            disabled>
                        <label for="nama_ibu">Nama Ibu</label>
                        <span class="helper-text">Nama Ibu</span>
                    </div>

                    <div class="input-field col s3">
                        <select id="select" name="warga_negara_ibu" disabled>
                            <option disabled selected> {{$akta->warga_negara_ibu}}</option>
                        </select>
                        <span class="helper-text">Warga negara ibu, wni/wna</span>
                    </div>

                    <div class="input-field col s3">
                        <input id="tanggal_perkawinan" type="text" class="datepicker" name="tanggal_perkawinan"
                            value="{{$akta->tanggal_perkawinan}}" disabled>
                        <label for="tanggal_perkawinan">Tanggal Perkawinan*</label>
                        <span class="helper-text left-align">Tanggal Perkawinan</span>
                    </div>

                </div>

                <blockquote style="margin-top: 30px">
                    Keterangan saksi
                </blockquote>
                <hr>

                <div class="row" style="margin-top: 20px">
                    <div class="input-field col s3">
                        <input id="nik_saksi_1" type="number" class="validate" name="nik_saksi_1"
                            value="{{$akta->nik_saksi_1}}" disabled>
                        <label for="nik_saksi_1">NIK Saksi 1*</label>
                        <span class="helper-text">Nomor Induk
                            Keluarga Saksi 1</span>
                    </div>

                    <div class="input-field col s3">
                        <input id="umur_saksi_1" type="number" class="validate" name="umur_saksi_1"
                            value="{{$akta->umur_saksi_1}}" disabled>
                        <label for="umur_saksi_1">Umur Saksi 1*</label>
                        <span class="helper-text">Umur Saksi 1</span>
                    </div>

                    <div class="input-field col s6">
                        <input id="alamat_saksi_1" type="text" class="validate" name="alamat_saksi_1"
                            value="{{$akta->alamat_saksi_1}}" disabled>
                        <label for="alamat_saksi_1">Alamat Saksi 1</label>
                        <span class="helper-text">Alamat Saksi 1</span>
                    </div>

                </div>

                <div class="row" style="margin-top: 20px">
                    <div class="input-field col s3">
                        <input id="nik_saksi_2" type="number" class="validate" name="nik_saksi_2"
                            value="{{$akta->nik_saksi_2}}" disabled>
                        <label for="nik_saksi_2">NIK Saksi 2*</label>
                        <span class="helper-text">Nomor Induk
                            Keluarga Saksi 1</span>
                    </div>

                    <div class="input-field col s3">
                        <input id="umur_saksi_2" type="number" class="validate" name="umur_saksi_2"
                            value="{{$akta->umur_saksi_2}}" disabled>
                        <label for="umur_saksi_2">Umur Saksi 2*</label>
                        <span class="helper-text">Umur Saksi 2</span>
                    </div>

                    <div class="input-field col s6">
                        <input id="alamat_saksi_2" type="text" class="validate" name="alamat_saksi_2"
                            value="{{$akta->alamat_saksi_2}}" disabled>
                        <label for="alamat_saksi_2">Alamat Saksi 2</label>
                        <span class="helper-text">Alamat Saksi 2</span>
                    </div>

                </div>

                <div class="row" style="margin-top: 20px">
                    <div class="input-field col s3">
                        <input id="nama_saksi_1" type="text" class="validate" name="nama_saksi_1"
                            value="{{$akta->nama_saksi_1}}" disabled>
                        <label for="nama_saksi_1">Nama Saksi 1*</label>
                        <span class="helper-text">Nama Saksi 1</span>
                    </div>

                    <div class="input-field col s3">
                        <input id="pekerjaan_saksi_1" type="text" class="validate" name="pekerjaan_saksi_1"
                            value="{{$akta->pekerjaan_saksi_1}}" disabled>
                        <label for="pekerjaan_saksi_1">Pekerjaan Saksi 1*</label>
                        <span class="helper-text">Pekerjaan Saksi 1</span>
                    </div>

                </div>

                <div class="row" style="margin-top: 20px">
                    <div class="input-field col s3">
                        <input id="nama_saksi_2" type="text" class="validate" name="nama_saksi_2"
                            value="{{$akta->nama_saksi_2}}" disabled>
                        <label for="nama_saksi_2">Nama Saksi 2*</label>
                        <span class="helper-text">Nama Saksi 2</span>
                    </div>

                    <div class="input-field col s3">
                        <input id="pekerjaan_saksi_2" type="text" class="validate" name="pekerjaan_saksi_2"
                            value="{{$akta->pekerjaan_saksi_2}}" disabled>
                        <label for="pekerjaan_saksi_2">Pekerjaan Saksi 2*</label>
                        <span class="helper-text">Pekerjaan Saksi 2</span>
                    </div>

                </div>

                <blockquote style="margin-top: 30px">
                    Lampiran Surat Keterangan <br>
                    Telah diupload dengan format file pdf.
                </blockquote>
                <hr>

                <div class="row" style="margin-top: 30px">
                    <div class="file-field input-field col s6" style="margin:0px">
                        <p>Surat Keterangan Lahir:</p> <a href="{{url('kasie/akta-kelahiran/'.$akta->id.'/open-pdf?pdf='.$akta->surat_keterangan_lahir)}}" target="_blank">{{$akta->surat_keterangan_lahir}}</a>
                    </div>

                    <div class="file-field input-field col s6" style="margin:0px">
                        <p>Kartu Keluarga:</p> <a href="{{url('kasie/akta-kelahiran/'.$akta->id.'/open-pdf?pdf='.$akta->kartu_keluarga)}}" target="_blank">{{$akta->kartu_keluarga}}</a>
                    </div>
                </div>

                <div class="row" style="margin-top: 30px">
                    <div class="file-field input-field col s6" style="margin:0px">
                        <p>Keterangan Akta Orang Tua:</p> <a href="{{url('kasie/akta-kelahiran/'.$akta->id.'/open-pdf?pdf='.$akta->keterangan_akta_orang_tua)}}" target="_blank">{{$akta->keterangan_akta_orang_tua}}</a>
                    </div>

                    <div class="file-field input-field col s6" style="margin:0px">
                        <p>SPTJM Pasutri:</p> <a href="{{url('kasie/akta-kelahiran/'.$akta->id.'/open-pdf?pdf='.$akta->sptjm_pasutri)}}" target="_blank">{{$akta->sptjm_pasutri}}</a>
                    </div>
                </div>

                <div class="row" style="margin-top: 30px">
                    <div class="file-field input-field col s6" style="margin:0px">
                        <p>Keterangan Permohonan Kelahiran:</p> <a
                            href="{{url('kasie/akta-kelahiran/'.$akta->id.'/open-pdf?pdf='.$akta->keterangan_permohonan_kelahiran)}}" target="_blank">{{$akta->keterangan_permohonan_kelahiran}}</a>
                    </div>

                    <div class="file-field input-field col s6" style="margin:0px">
                        <p>SPTJM Kebenaran Kelahiran:</p> <a href="{{url('kasie/akta-kelahiran/'.$akta->id.'/open-pdf?pdf='.$akta->sptjm_kebenaran_kelahiran)}}" target="_blank">{{$akta->sptjm_kebenaran_kelahiran}}</a>
                    </div>
                </div>

                <div class="row" style="margin-top: 30px">
                    <div class="file-field input-field col s6" style="margin:0px">
                        <p>Keterangan Anak Kawin:</p> <a href="{{url('kasie/akta-kelahiran/'.$akta->id.'/open-pdf?pdf='.$akta->keterangan_anak_kawin)}}" target="_blank">{{$akta->keterangan_anak_kawin}}</a>
                    </div>

                    <div class="file-field input-field col s6" style="margin:0px">
                        <p>Pernyataan Saksi:</p> <a href="{{url('kasie/akta-kelahiran/'.$akta->id.'/open-pdf?pdf='.$akta->pernyataan_saksi)}}" target="_blank">{{$akta->pernyataan_saksi}}</a>
                    </div>
                </div>

                <div class="row" style="margin-top: 30px">
                    <div class="file-field input-field col s6" style="margin:0px">
                        <p>KTP Saksi Kelahiran(Balikpapan):</p> <a href="{{url('kasie/akta-kelahiran/'.$akta->id.'/open-pdf?pdf='.$akta->ktp_saksi_balikpapan)}}" target="_blank">{{$akta->ktp_saksi_balikpapan}}</a>
                    </div>

                    <div class="file-field input-field col s6" style="margin:0px">
                        <p>Surat Kuasa(Jika Diwakilkan):</p> <a href="{{url('kasie/akta-kelahiran/'.$akta->id.'/open-pdf?pdf='.$akta->surat_kuasa)}}" target="_blank">{{$akta->surat_kuasa}}</a>
                    </div>
                </div>

                <div class="row" style="margin-top: 30px">
                    <div class="file-field input-field col s6" style="margin:0px">
                        <p>Fotocopy Akta Anak Sebelumnya (jika anak kedua):</p> <a
                            href="{{url('kasie/akta-kelahiran/'.$akta->id.'/open-pdf?pdf='.$akta->fotocopy_akta_anak)}}" target="_blank">{{$akta->fotocopy_akta_anak}}</a>
                    </div>
                </div>

            </div>

        </div>

        <div class="card">
            <div class="card-content">
                <span class="card-title">Review <button data-target="modal1"
                        class="waves-effect waves-light blue btn-small tooltipped btn modal-trigger right review"
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

                        @isset($akta->review_kabid)
                        <div class="card">
                            <div class="card-content">
                                <p>Review Kabid: @if ($akta->status_kabid == 1)
                                    <span class="new badge orange right" data-badge-caption="Diproses"></span>
                                    @elseif($akta->status_kabid == 2)
                                    <span class="new badge red right" data-badge-caption="Ditolak"></span>
                                    @else
                                    <span class="new badge green right" data-badge-caption="Disetujui"></span>
                                    @endif</p>
                                <p>{{$akta->review_kabid}}</p>
                            </div>
                        </div>
                        @endisset

                    </div>
                    <div class="modal-footer">
                        <a href="#!" class="modal-close waves-effect waves-green btn red">Cancel</a>
                    </div>
                </div>

                <form action="{{url('kasie/akta-kelahiran/'.$akta->id)}}" method="POST">
                    @method('put')
                    @csrf

                    <div class="row">
                        <div class="input-field col s12">
                            <textarea id="textarea2" class="materialize-textarea" name="review_kasie"
                                required></textarea>
                            <label for="textarea2">Review:</label>
                            <span class="helper-text">Berikan review untuk akta kelahiran ini.</span>
                        </div>
                    </div>


                    <label style="margin-right: 8px">
                        <input name="status_kasie" type="radio" value="3" required />
                        <span>Setuju</span>
                    </label>

                    <label>
                        <input name="status_kasie" type="radio" value="2" required />
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