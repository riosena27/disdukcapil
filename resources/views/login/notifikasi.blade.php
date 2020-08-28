@extends('layout.master_login')

@section('title', 'Terima Kasih')

@section('content')

<div class="flex-center position-ref full-height">
    <div class="content">
        <div class="card">
            <div class="card-content">
                <div class="row">
                    Terima kasih sudah mendaftar. Kode verifikasi untuk registrasi telah dikirimkan ke email anda. Gunakan kode tersebut untuk login.
                </div>
                <a href="{{url('/')}}" class="waves-effect waves-light btn red">Kembali</a>
                
            </div>
        </div>
    </div>
</div>


@endsection