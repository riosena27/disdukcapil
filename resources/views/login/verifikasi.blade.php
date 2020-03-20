@extends('layout.master_login')

@section('title', 'Verifikasi')

@section('content')

<div class="card">
    <div class="card-content">
    
        <div class="row">
            <div class="col s12">
                <h6><b>Masukkan Kode Verifikasi</b> </h6>
            </div>
        </div>
        <form action="{{url('verifikasi')}}" method="post">
            @csrf
            <div class="row" style="margin:0">
                <div class="input-field col s12" style="margin:0">
                    <input id="verifikasi" type="text" class="validate" name="kode_verifikasi" data-length="6">
                    <label for="verifikasi">Kode Verifikasi</label>
                    <span class="helper-text left-align" data-error="Masukkan jumlah kode anda dengan valid">Masukkan kode verifikasi yang telah anda terima dari email.</span>
                    @error('kode_verifikasi')
                    <span class="helper-text red-text">{{ $message }}</span>
                    @enderror
                </div>
            </div>

            <div class="row">
                <button type="submit" class="waves-effect waves-light btn">Confirm</a>
            </div>
        </form>
    </div>
</div>

@endsection

@section('javascript')
    <script>
        document.addEventListener('DOMContentLoaded', function () {
            var textNeedCount = document.querySelectorAll('#verifikasi');
            M.CharacterCounter.init(textNeedCount);
    });
    </script>

@endsection