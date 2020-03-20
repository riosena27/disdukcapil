@extends('layout.master_login')

@section('title', 'Dashboard')

@section('content')

<div class="card">

    <div class="card-content">

        Anda sudah masuk {{Auth::user()->name}}.

    </div>

</div>

@endsection