@extends('layout.master_login')

@section('title', 'Terima Kasih')

@section('content')

<div class="card">
    <div class="card-content">
        <div class="row">
            Terima kasih sudah mendaftar. Kode verifikasi login sudah dikirimkan ke email anda.
        </div>
        <a href="{{url('/')}}" class="waves-effect waves-light btn red">Kembali</a>
        
    </div>
</div>

@endsection