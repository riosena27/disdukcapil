@extends('layout.master_login')

@section('title', 'Akta Kelahiran')

@section('content')

<div class="container" style="margin-top: 18px">
    <div class="card">
        <div class="card-content">
            <span class="card-title">Daftar Akta Kelahiran <a href="{{url('akta-kelahiran/create')}}" class="waves-effect waves-light btn right"><i class="material-icons right">library_add</i>Tambah Data</a></span>
            <table class="responsive-table striped" style="margin-top: 20px">
                <thead>
                    <tr>
                        <th>No Pendaftaran</th>
                        <th>NIK Pemohon</th>
                        <th>Nama Lengkap</th>
                        <th>Status</th>
                        <th>Action</th>
                    </tr>
                </thead>
                <tbody>
                    {{-- @foreach ($user as $usr)
                        <tr>
                            <td>{{$loop->iteration}}</td>
                            <td>{{$usr->name}}</td>
                            <td>{{$usr->email}}</td>
                            <td>{{implode(', ', $usr->roles()->get()->pluck('name')->toArray())}}</td>
                            <td>
                                <a class="btn-floating btn-large waves-effect waves-light green btn-small tooltipped" data-position="top" data-tooltip="Edit" style="margin-right: 8px"><i class="material-icons">create</i></a>

                                <a class="btn-floating btn-large waves-effect waves-light red btn-small tooltipped" data-position="top" data-tooltip="Delete"><i class="material-icons">clear</i></a>

                            </td>
                        </tr>
                    @endforeach --}}
                </tbody>
            </table>
        </div>
    </div>
</div>

@endsection