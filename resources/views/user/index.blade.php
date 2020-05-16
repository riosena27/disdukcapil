@extends('layout.master_login')

@section('title', 'Beranda')

@section('content')

<div class="flex-center position-ref full-height">
    <div class="content">
        <div class="row">
            <div class="col">
                <div class="card horizontal">
                    <div class="card-image">
                        <img src="{{ url('/asset/dashboard/boy.png') }}" style="width: 100px; margin-top: 10px">
                    </div>
                    <div class="card-stacked">
                        <div class="card-content">
                            <h6>Akta Kelahiran</h6>
                        </div>
                        <div class="card-action">
                            <a href="{{url('akta-kelahiran')}}">Masuk</a>
                        </div>
                    </div>
                </div>
            </div>

            <div class="col">
                <div class="card horizontal">
                    <div class="card-image">
                        <img src="{{ url('/asset/dashboard/interface.png') }}" style="width: 100px; margin-top: 20px; padding-right:10px; padding-left:10px;">
                    </div>
                    <div class="card-stacked">
                        <div class="card-content">
                            <h6>Akta Kematian</h6>
                        </div>
                        <div class="card-action">
                            <a href="#">Masuk</a>
                        </div>
                    </div>
                </div>
            </div>

            {{-- <div class="col s4">
                <div class="card horizontal">
                    <div class="card-image">
                        <img src="{{ url('/asset/dashboard/boy.png') }}" style="width: 100px; margin-top: 10px">
                    </div>
                    <div class="card-stacked">
                        <div class="card-content">
                            {{Auth::user()->name}}
                        </div>
                        <div class="card-action">
                            <a href="#">This is a link</a>
                        </div>
                    </div>
                </div>
            </div> --}}
        </div>
    </div>

</div>


@endsection