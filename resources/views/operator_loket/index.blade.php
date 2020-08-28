@extends('layout.master')

@section('title', 'Beranda')

@section('content')

<div class="row">
    <div class="col s12">
        <div class="card">
            <div class="card-content">
                <span class="card-title">Daftar Pengambilan</span>
            <table class="responsive-table" style="margin-top: 20px">
                <thead>
                    <tr>
                        <th>No Pendaftaran</th>
                        <th>Jenis Pemohonan</th>
                        <th>Status Pengambilan</th>
                        <th>Tanggal Diajukan</th>
                        <th>Action</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($akta as $item)
                    <tr>
                        <td>{{$item->no_resi}}</td>
                        <td>Akta Kelahiran</td>
                        <td> <span class="new badge green" data-badge-caption="{{$item->status_pengambilan}}"></span></td>
                        <td>{{$item->updated_at->format('j F Y')}}</td>
                        <td><button data-target="modal1" data-name="{{$item->nama_anak}}" data-url="{{url('operator-loket/pengambilan/'.$item->id)}}" class="btn-floating btn-large waves-effect waves-light red btn-small tooltipped btn modal-trigger set-ambil" data-position="top" data-tooltip="Set tanggal pengambilan/pengantaran"><i class="material-icons">event</i></button></td>
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
                        <h4>Pilih tanggal pengambilan</h4>

                        <h6></h6>
                        <div class="row" style="margin-bottom: 0">
                            <div class="input-field col s12" style="margin-bottom: 0">
                                <input type="text" name="tanggal_pengambilan" class="datepicker">
                                <label for="datepicker">Set Tanggal Pengambilan</label>
                            </div>
                        </div>

                        <div class="row">
                            <div class="input-field col s12" style="margin-bottom: 0">
                                <input  id="deskripsi_pengambilan"  type="text" name="deskripsi_pengambilan" class="validate">
                                <label for="deskripsi_pengambilan">Deskripsi pengambilan</label>
                            </div>
                        </div>
                        <div class="modal-footer">
                            <a href="#!" class="modal-close waves-effect waves-green btn-flat">Cancel</a>
                            <button type="submit" class="modal-close waves-effect waves-green btn blue">Simpan</button>
                        </div>
                    </div>
                    
                </div>
            </form>
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

        document.addEventListener('DOMContentLoaded', function() {
            var elems = document.querySelectorAll('.datepicker');
            var instances = M.Datepicker.init(elems, {
                container: 'body',
                minDate: new Date()
            });
        });

        $('.set-ambil').click(function () {
                var header = $(this).attr('data-name');
                var url = $(this).attr('data-url');
                console.log(header);
                $("#modal1").find("h6").text("Akta Kelahiran "+header);
                $("#ambilForm").attr("action", url);
    });
    </script>
@endsection
