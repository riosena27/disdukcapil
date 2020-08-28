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
                        <th>Tanggal Dibuat</th>
                        <th>Status Pengambilan</th>
                        <th>Aksi</th>
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
                            <td>{{$item->created_at->format('j F Y')}}</td>
                            <td>
                                @isset($item->status_pengambilan)
                                    {{$item->status_pengambilan}}
                                @endisset
                            </td>
                            <td>
                                @if ($item->status_operator == 2)
                                    <a href="{{url('akta-kelahiran/'.$item->id.'/edit')}}" class="btn-floating btn-large waves-effect waves-light green btn-small tooltipped" data-position="top" data-tooltip="Edit" style="margin-right: 8px"><i class="material-icons">create</i></a>
                                @endif

                                @if($item->status_kadis == 3 && $item->status_pengambilan == null)
                                <button data-target="modal1" data-name="{{$item->nama_anak}}" data-url="{{url('akta-kelahiran/pengambilan/'.$item->id)}}" class="btn-floating btn-large waves-effect waves-light blue btn-small tooltipped btn modal-trigger ambil-data" data-position="top" data-tooltip="Pilih jenis pengambilan"><i class="material-icons">folder_open</i></button>
                                @endif

                                @isset($item->tanggal_pengambilan)
                                <span class="new badge purple center-align" data-badge-caption="berkas telah diambil pada tanggal {{$item->tanggal_pengambilan->format('j F Y')}}"></span> <br> <small>Penanggung jawab: {{$item->operatorloket->name}}. @isset($item->deskripsi_pengambilan)
                                    <a href="#" class="tooltipped modal-trigger deskripsi" data-target="modaldesc" data-position="top" data-name="{{$item->deskripsi_pengambilan}}" data-tooltip="{{$item->deskripsi_pengambilan}}">
                                    Lihat Deskripsi.
                                    @endisset</a></small>
                                @endisset
                                
                                

                            </td>
                            
                        </tr>
                    @endforeach
                </tbody>
            </table>

            <!-- Modal Structure -->
            <form action="" method="POST" id="ambilForm">
                @method('put')
                @csrf
                <div id="modal1" class="modal">
                    <div class="modal-content">
                        <h4>Pilih jenis pengambilan</h4>

                        <h6></h6>
                        <div class="row">
                            <div class="input-field col s12" style="margin-bottom: 0">
                                <select id="select" name="pengambilan" required>
                                    <option value="" disabled selected> Pilih Jenis Pengambilan</option>
                                    <option value="Diantar">Diantar</option>
                                    <option value="Ambil ditempat">Ambil ditempat</option>
                                </select>
                                <label>Jenis Pengambilan</label>
                            </div>
                        </div>
                    </div>
                    <div class="modal-footer">
                        <a href="#!" class="modal-close waves-effect waves-green btn-flat">Cancel</a>
                        <button type="submit" class="modal-close waves-effect waves-green btn blue">Simpan</button>
                    </div>
                </div>
            </form>

            {{-- modal deskripsi --}}

            <div id="modaldesc" class="modal">
                <div class="modal-content">
                    <h5>Deskripsi pengambilan permohonan</h5>
                            <p></p>
                </div>
                <div class="modal-footer">
                    <a href="#!" class="modal-close waves-effect waves-green btn-flat">Cancel</a>
                </div>
            </div>
        </div>
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

    document.addEventListener('DOMContentLoaded', function () {
        var elems = document.querySelectorAll('select');
        var instances = M.FormSelect.init(elems);
    });

    $('.ambil-data').click(function () {
                var header = $(this).attr('data-name');
                var url = $(this).attr('data-url');
                console.log(header);
                $("#modal1").find("h6").text("Akta Kelahiran "+header);
                $("#ambilForm").attr("action", url);
    });

    $('.deskripsi').click(function () {
                var desc = $(this).attr('data-name');
                
                $("#modaldesc").find("p").text(desc);
    });
</script>
@endsection