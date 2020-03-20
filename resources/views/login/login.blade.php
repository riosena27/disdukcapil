@extends('layout.master_login')

@section('title', 'Disdukcapil')

@section('content')

<div class="card">
    <div class="card-content">
        <img class="responsive-img" width="150" src="{{url('/asset/layout/login/logobpp.png')}}">

        <div class="row">
            <div class="col s12">
                <h6><b>SISTEM INFORMASI DISDUKCAPIL</b> </h6>
            </div>
        </div>
        <form action="{{url('authenticate')}}" method="post">
            @csrf
            <div class="row" style="margin:0">
                <div class="input-field col s12" style="margin:0">
                    <input id="email" type="email" class="validate" name="email">
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
                <button type="submit" class="waves-effect waves-light btn">Login</a>
            </div>
        </form>
        <div class="row">
            Belum punya akun? <a href="{{url('register')}}"><u>Daftar disini.</u></a>
        </div>
    </div>
</div>

@endsection