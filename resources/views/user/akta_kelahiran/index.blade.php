@extends('layout.master_login')

@section('title', 'Akta Kelahiran')

@section('content')

<div class="container" style="margin-top: 18px">
    <div class="card">
        <div class="card-content">
            <span class="card-title">Daftar Akta Kelahiran <a href="{{url('akta-kelahiran/create')}}" class="waves-effect waves-light btn right"><i class="material-icons right">library_add</i>Tambah Data</a></span>
            <table class="responsive-table" style="margin-top: 20px">
                <thead>
                    <tr>
                        <th>No Pendaftaran</th>
                        <th>Nama Anak</th>
                        <th>Status</th>
                        <th>Action</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($akta as $item)
                        <tr>
                            <td>{{$item->no_resi}}</td>
                            <td>{{$item->nama_anak}}</td>
                            <td>
                                @if ($item->status_kabid == 3)
                                            <span class="new badge green center-align" data-badge-caption="Disetujui"></span>
                                        @elseif($item->status_operator == 2)
                                            <span class="new badge red center-align" data-badge-caption="Ditolak petugas"></span>
                                        @else
                                        <span class="new badge orange center-align" data-badge-caption="Diproses"></span>
                                        @endif
                            </td>
                            <td>
                                @if ($item->status_operator == 2)
                                    <a href="{{url('akta-kelahiran/'.$item->id.'/edit')}}" class="btn-floating btn-large waves-effect waves-light green btn-small tooltipped" data-position="top" data-tooltip="Edit" style="margin-right: 8px"><i class="material-icons">create</i></a>
                                @endif

                                <a class="btn-floating btn-large waves-effect waves-light blue btn-small tooltipped" data-position="top" data-tooltip="Lihat Detail"><i class="material-icons">folder_open</i></a>

                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
</div>

@endsection