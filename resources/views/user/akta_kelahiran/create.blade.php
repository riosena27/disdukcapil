@extends('layout.master_login')

@section('title', 'Buat Akta Kelahiran')

@section('content')

<div class="container" style="margin-top: 18px">

    <div class="card">
        <div class="card-content">
            <div class="row">
                <a href="{{url('akta-kelahiran')}}" class="waves-effect waves-light btn red left"><i
                    class="material-icons left">keyboard_backspace</i></a>
            </div>
            <hr>
            <span class="card-title">Pengajuan Akta Kelahiran </span><span class="helper-text">*wajib diisi</span>
            <blockquote>
                Data Bayi
            </blockquote>
            <form action="{{url('admin')}}" method="POST">
                @csrf

                {{-- 1 --}}
                <div class="row" style="margin-top: 20px">
                    <div class="input-field col s3" style="margin: 0px">
                        <input id="NIK" type="number" class="validate" name="nik">
                        <label for="NIK">NIK</label>
                        <span class="helper-text" data-error="Isi nama anda" data-success="Nama ok">Nomor Induk
                            Keluarga</span>
                    </div>

                    <div class="input-field col s3" style="margin: 0px">
                        <input id="tempat_kelahiran" type="text" class="validate" name="tempat_kelahiran">
                        <label for="tempat_kelahiran">Tempat Kelahiran*</label>
                        <span class="helper-text">Tempat Kelahiran, cth: Balikpapan</span>
                    </div>

                    <div class="input-field col s3" style="margin: 0px">
                        <input id="kelahiran" type="text" class="validate" name="kelahiran">
                        <label for="kelahiran">Kelahiran ke*</label>
                        <span class="helper-text">Cth: 1</span>
                    </div>

                    <div class="input-field col s3" style="margin: 0px">
                        <input id="nomor_kk" type="number" class="validate" name="nomor_kk">
                        <label for="nomor_kk">Nomor KK*</label>
                        <span class="helper-text">Nomor Kartu Keluarga</span>
                    </div>
                </div>

                {{-- 2 --}}
                <div class="row" style="margin-top: 30px">
                    <div class="input-field col s3" style="margin: 0px">
                        <input id="nama_anak" type="text" class="validate" name="nama_anak">
                        <label for="nama_anak">Nama Anak*</label>
                        <span class="helper-text">Nama Anak</span>
                    </div>

                    <div class="input-field col s3" style="margin: 0px">
                        <input id="tanggal_lahir" type="text" class="datepicker" name="tanggal_lahir">
                        <label for="tanggal_lahir">Tanggal Lahir*</label>
                        <span class="helper-text left-align">Tanggal lahir (yyyy/mm/dd)</span>
                    </div>

                    <div class="input-field col s3" style="margin: 0px">
                        <select name="penolong_kelahiran">
                            <option disabled selected>Penolong Kelahiran*</option>
                            <option value="dokter">Dokter</option>
                            <option value="bidan/perawat">Bidan/Perawat</option>
                            <option value="dukun">Dukun</option>
                            <option value="lainnya">Lainnya</option>
                        </select>
                        <span class="helper-text left-align">Penolong Kelahiran</span>
                    </div>

                    <div class="input-field col s3" style="margin: 0px">
                        <input id="nama_kepala_keluarga" type="text" class="validate" name="nama_kepala_keluarga">
                        <label for="nama_kepala_keluarga">Nama Kepala Keluarga*</label>
                        <span class="helper-text">Nama Kepala Keluarga</span>
                    </div>
                </div>

                {{-- 3 --}}
                <div class="row" style="margin-top: 30px">
                    <div class="input-field col s3" style="margin: 0px">
                        <select id="select" name="jenis_kelamin">
                            <option value="" disabled selected> Pilih Jenis Kelamin</option>
                            <option value="Laki-Laki">Laki-laki</option>
                            <option value="Wanita">Wanita</option>
                        </select>
                        <span class="helper-text">Jenis Kelamin</span>
                    </div>

                    <div class="input-field col s3" style="margin: 0px">
                        <input id="waktu_lahir" type="text" class="timepicker" name="waktu_lahir">
                        <label for="waktu_lahir">Waktu Lahir*</label>
                        <span class="helper-text left-align">Waktu Lahir</span>
                    </div>

                    <div class="input-field col s3" style="margin: 0px">
                        <input id="berat_bayi" type="number" class="validate" name="berat_bayi">
                        <label for="berat_bayi">Berat Bayi*</label>
                        <span class="helper-text">Berat bayi dalam kilogram</span>
                    </div>

                    <div class="input-field col s3" style="margin: 0px">
                        <input id="no_hp" type="number" class="validate" name="no_hp">
                        <label for="no_hp">Nomor Handphone*</label>
                        <span class="helper-text">Nomor Handphone</span>
                    </div>
                </div>

                {{-- 4 --}}
                <div class="row" style="margin-top: 30px;">
                    <div class="input-field col s3" style="margin: 0px">
                        <select id="select" name="tempat_dilahirkan">
                            <option value="" disabled selected> Tempat Dilahirkan*</option>
                            <option value="Rumah Sakit">Rumah Sakit</option>
                            <option value="Puskesmas">Puskesmas</option>
                            <option value="Rumah">Rumah</option>
                            <option value="Lainnya">Lainnya</option>
                        </select>
                        <span class="helper-text">Tempat dilahirkan</span>
                    </div>

                    <div class="input-field col s3" style="margin: 0px">
                        <select id="select" name="jenis_kelahiran">
                            <option value="" disabled selected> Jenis Kelahiran*</option>
                            <option value="Tunggal">Tunggal</option>
                            <option value="Kembar 1">Kembar 1</option>
                            <option value="Lainnya">Rumah</option>
                        </select>
                        <span class="helper-text">Jenis Kelahiran</span>
                    </div>

                    <div class="input-field col s3" style="margin: 0px">
                        <input id="tinggi_bayi" type="number" class="validate" name="tinggi_bayi">
                        <label for="tinggi_bayi">Tinggi Bayi*</label>
                        <span class="helper-text">Tinggi Bayi dalam cm</span>
                    </div>

                    <div class="input-field col s3" style="margin: 0px">
                        <select id="select" name="warga_negara">
                            <option value="" disabled selected> Warga Negara*</option>
                            <option value="WNI">WNI</option>
                            <option value="WNA">WNA</option>
                        </select>
                        <span class="helper-text">Warga negara wni/wna</span>
                    </div>
                </div>

                <blockquote style="margin-top: 30px">
                    Keterangan data yang dimohonkan
                </blockquote>

                {{-- 1 --}}
                <div class="row" style="margin-top: 20px">
                    <div class="input-field col s3" style="margin: 0px">
                        <input id="nik_ayah" type="number" class="validate" name="nik_ayah">
                        <label for="nik_ayah">NIK Ayah</label>
                        <span class="helper-text" data-error="Isi nama anda" data-success="Nama ok">Nomor Induk
                            Keluarga Ayah</span>
                    </div>

                    <div class="input-field col s3" style="margin: 0px">
                        <input id="pekerjaan_ayah" type="text" class="validate" name="pekerjaan_ayah">
                        <label for="pekerjaan_ayah">Pekerjaan Ayah*</label>
                        <span class="helper-text">Pekerjaan Ayah, cth: Swasta</span>
                    </div>

                    <div class="input-field col s3" style="margin: 0px">
                        <input id="alamat" type="text" class="validate" name="alamat">
                        <label for="alamat">Alamat</label>
                        <span class="helper-text">Alamat tempat tinggal</span>
                    </div>

                    <div class="input-field col s3" style="margin: 0px">
                        <input id="nomor_surat_kawin" type="number" class="validate" name="nomor_surat_kawin">
                        <label for="nomor_surat_kawin">Nomor Surat Kawin*</label>
                        <span class="helper-text">Nomor Surat Kawin</span>
                    </div>
                </div>

                {{-- 2 --}}
                <div class="row" style="margin-top: 20px">
                    <div class="input-field col s3" style="margin: 0px">
                        <input id="nama_ayah" type="text" class="validate" name="nama_ayah">
                        <label for="nama_ayah">Nama Ayah</label>
                        <span class="helper-text">Nama Ayah</span>
                    </div>

                    <div class="input-field col s3" style="margin: 0px">
                        <select id="select" name="warga_negara_ayah">
                            <option value="" disabled selected> Warga Negara Ayah*</option>
                            <option value="WNI">WNI</option>
                            <option value="WNA">WNA</option>
                        </select>
                        <span class="helper-text">Warga negara ayah, wni/wna</span>
                    </div>

                    <div class="input-field col s3" style="margin: 0px">
                        <select id="select" name="status_perkawinan">
                            <option value="" disabled selected> Status Perkawinan*</option>
                            <option value="Sah">Sah</option>
                            <option value="Tidak sah">Tidak sah</option>
                        </select>
                        <span class="helper-text">Warga negara wni/wna</span>
                    </div>

                </div>

                {{-- 3 --}}
                <div class="row" style="margin-top: 20px">
                    <div class="input-field col s3" style="margin: 0px">
                        <input id="nik_ibu" type="number" class="validate" name="nik_ibu">
                        <label for="nik_ibu">NIK Ibu</label>
                        <span class="helper-text">Nomor Induk
                            Keluarga Ibu</span>
                    </div>

                    <div class="input-field col s3" style="margin: 0px">
                        <input id="pekerjaan_ibu" type="text" class="validate" name="pekerjaan_ibu">
                        <label for="pekerjaan_ibu">Pekerjaan Ibu*</label>
                        <span class="helper-text">Pekerjaan Ibu, cth: IRT</span>
                    </div>

                    <div class="input-field col s3" style="margin: 0px">
                        <input id="agama" type="text" class="validate" name="agama">
                        <label for="agama">Agama</label>
                        <span class="helper-text">Agama</span>
                    </div>

                </div>

                {{-- 4 --}}
                <div class="row" style="margin-top: 20px">
                    <div class="input-field col s3" style="margin: 0px">
                        <input id="nama_ibu" type="text" class="validate" name="nama_ibu">
                        <label for="nama_ibu">Nama Ibu</label>
                        <span class="helper-text">Nama Ibu</span>
                    </div>

                    <div class="input-field col s3" style="margin: 0px">
                        <select id="select" name="warga_negara_ibu">
                            <option value="" disabled selected> Warga Negara Ibu*</option>
                            <option value="WNI">WNI</option>
                            <option value="WNA">WNA</option>
                        </select>
                        <span class="helper-text">Warga negara ibu, wni/wna</span>
                    </div>

                    <div class="input-field col s3" style="margin: 0px">
                        <input id="tanggal_perkawinan" type="text" class="datepicker" name="tanggal_perkawinan">
                        <label for="tanggal_perkawinan">Tanggal Perkawinan*</label>
                        <span class="helper-text left-align">Tanggal Perkawinan (yyyy/mm/dd)</span>
                    </div>

                </div>

                <blockquote style="margin-top: 30px">
                    Keterangan saksi
                </blockquote>

                <div class="row" style="margin-top: 20px">
                    <div class="input-field col s3" style="margin: 0px">
                        <input id="nik_saksi_1" type="number" class="validate" name="nik_saksi_1">
                        <label for="nik_saksi_1">NIK Saksi 1</label>
                        <span class="helper-text">Nomor Induk
                            Keluarga Saksi 1</span>
                    </div>

                    <div class="input-field col s3" style="margin: 0px">
                        <input id="pekerjaan_ibu" type="text" class="validate" name="pekerjaan_ibu">
                        <label for="pekerjaan_ibu">Pekerjaan Ibu*</label>
                        <span class="helper-text">Pekerjaan Ibu, cth: IRT</span>
                    </div>

                    <div class="input-field col s3" style="margin: 0px">
                        <input id="agama" type="text" class="validate" name="agama">
                        <label for="agama">Agama</label>
                        <span class="helper-text">Agama</span>
                    </div>

                </div>

                <div class="row" style="margin-bottom: 0px;">
                    <div class="col s12" style="margin-top: 20px">
                        <a class="waves-effect waves-light btn red left"><i
                        class="material-icons left">keyboard_backspace</i>Kembali</a>
                        <button type="submit" class="waves-effect waves-light btn right"><i
                                class="material-icons right">send</i>Simpan</button></div>
                </div>
            </form>
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
            format: "yyyy/mm/dd"  
        });
    });

    document.addEventListener('DOMContentLoaded', function() {
        var elems = document.querySelectorAll('.timepicker');
        var instances = M.Timepicker.init(elems);
    });
</script>
@endsection