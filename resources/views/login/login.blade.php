@extends('layout.master_login')

@section('title', 'Disdukcapil')

@section('content')

<div class="card">
    <div class="card-content">
        <img class="responsive-img" width="150" src="{{url('/asset/layout/login/Logo Kota Balikpapan.jpg')}}">
        
        <div class="row">
            <div class="col s12">
                <h6><b>SISTEM INFORMASI DISDUKCAPIL</b> </h6>
            </div>
        </div>
        <div class="row" style="margin:0">
            <div class="input-field col s12" style="margin:0">
                <input id="email" type="email" class="validate" name="password">
                <label for="email">Email</label>
            </div>
        </div>
        <div class="row">
            <div class="input-field col s12">
                <input id="password" type="password" class="validate" name="password">
                <label for="password">Password</label>
            </div>
        </div>

        <div class="row">
            <a class="waves-effect waves-light btn">Login</a>
        </div>
        <div class="row">
            Belum punya akun? <a href="#"><u>Daftar disini.</u></a>
        </div>
    </div>
</div>

@endsection