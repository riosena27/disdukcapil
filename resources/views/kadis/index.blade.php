@extends('layout.master')

@section('title', 'Beranda')

@section('content')

<div class="row">
    <div class="col s6">
        <a href="{{url('kadis/akta-kelahiran')}}" class="grey-text">
        <div class="card">
            <div class="card-content center-align">
                <img src="{{ url('/asset/dashboard/boy.png') }}" alt="" style="width: 100px">
                <h5>Akta Kelahiran</h5>
            </div>
        </div>
        </a>
    </div>

    <div class="col s6">
        <a href="#" class="grey-text">
            <div class="card">
                <div class="card-content center-align">
                    <img src="{{ url('/asset/dashboard/interface.png') }}" alt="" style="width: 100px">
                    <h5>Akta Kematian</h5>
                </div>
            </div>
            </a>
    </div>
</div>

@endsection

@section('javascript')
<script>
    document.addEventListener('DOMContentLoaded', function() {
        var elems = document.querySelectorAll('.modal');
        console.log(elems);
        var instances = M.Modal.init(elems);
    });
</script>
@endsection