@extends('layout.master')

@section('title', 'Beranda')

@section('content')

<div class="card">
    <div class="card-content">
        {{Auth::user()->name}}
    </div>
</div>

@endsection