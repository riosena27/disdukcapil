@extends('layout.master')

@section('title', 'Akta Kelahiran')

@section('content')

<div class="row">
    <div class="col s12">
        <div class="card">
            <div class="card-content">
                <div class="row">
                    <a href="{{url('kabid')}}" class="waves-effect waves-light btn red left"><i
                            class="material-icons left">keyboard_backspace</i></a>
                </div>
                
                <span class="card-title">Review Akta Kelahiran</span>

                <table class="responsive-table" style="margin-top: 20px">
                    <thead>
                        <tr>
                            <th>No Pendaftaran</th>
                            <th>NIK Pemohon/Nama</th>
                            <th width="250px">Tanggal Dikirim</th>
                            <th>Status</th>
                            <th>Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($aktaUser as $item)
                            <tr>
                                <td>{{$item->no_resi}}</td>
                                <td>{{$item->nik}}  - {{$item->nama_anak}}</td>
                                <td>
                                    {{$item->created_at->format('j F Y')}}
                                </td>
                                <td>
                                    @if ($item->status_kadis == 2)
                                    <span class="new badge red" data-badge-caption="Ditolak Kadis"></span>
                                    @else
                                        <span class="new badge orange" data-badge-caption="Diproses"></span>
                                    @endif
                                </td>
                                <td align="center">
                                    <a href="{{url('kabid/akta-kelahiran/'.$item->id)}}" class="waves-effect waves-light btn blue tooltipped btn-small" data-position="top" data-tooltip="Review Akta Kelahiran">Review Data<i class="material-icons right">folder_open</i></a>
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>

@endsection