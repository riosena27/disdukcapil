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
                
                <span class="card-title">Review Akta Kelahiran <button
                    type="button" class="waves-effect waves-light green btn right status btn modal-trigger setujui" data-toggle="modal" data-target="modal" data-header="Setujui Akta Kelahiran" data-content="Apakah anda ingin menyetujui akta kelahiran yang dipilih?" disabled>Setujui</button> <button data-toggle="modal" data-target="modal" class="waves-effect waves-light red btn right status btn modal-trigger tolak" style="margin-right: 12px" data-header="Tolak Akta Kelahiran" data-content="Apakah anda ingin menolak akta kelahiran yang dipilih?"  disabled>Tolak</button></span>

                <!-- Modal Structure -->
                    <div id="modal" class="modal">
                        <div class="modal-content">
                            <h4 id="headerContent"></h4>
                            <span id="statusContent"></span>
                        </div>
                        <div class="modal-footer">
                            <a href="#!" class="modal-close waves-effect waves-green btn-flat">Cancel</a>
                            <button type="submit" class="modal-close waves-effect waves-green btn red" id="yesReview">Yes</button>
                        </div>
                    </div>
                
                <form action="{{url('kabid/akta-kelahiran/review-checked')}}" method="POST" id="giveStatus">
                @method('put')
                @csrf
                <span id="statusKabid"></span>
                <table class="responsive-table" style="margin-top: 20px">
                    <thead>
                        <tr>
                            <th><label>
                                <input type="checkbox" id="checkAll" class="check"/>
                                <span></span>
                                </label></th>
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
                                <td><label>
                                    <input type="checkbox" id="{{$item->id}}" value="{{$item->id}}" class="check" name="status[]"/>
                                    <span></span>
                                    </label></td>
                                <td>{{$item->no_resi}}</td>
                                <td>{{$item->nama_anak}}</td>
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
            </form>
            </div>
        </div>
    </div>
</div>

@endsection

@section('javascript')
<script>
    $(document).ready(function () {
        $("#checkAll").click(function () {
            $(".check").prop('checked', $(this).prop('checked'));
        });
        $('.check').change(function(){
            $('.status').prop('disabled', $('.check:checked').length == 0);
        });
    });
</script>

<script>
    document.addEventListener('DOMContentLoaded', function() {
        var elems = document.querySelectorAll('.modal');
        console.log(elems);
        var instances = M.Modal.init(elems);
    });
</script>

<script>
    $(document).ready(function () {
        $('#yesReview').click(function () {
            $('#giveStatus').submit();
        });
    });
</script>

<script>
    $(document).ready(function () {
            $('.setujui').click(function () {
                var header = $(this).attr('data-header');
                var content = $(this).attr('data-content');
                console.log(header);
                $("#modal").find("h4").text(header);
                $("#modal").find("#statusContent").text(content);
                $("#statusKabid").html('<input type="hidden" name="statusKabid" value="3">');
            });

            $('.tolak').click(function () {
                var header = $(this).attr('data-header');
                var content = $(this).attr('data-content');
                console.log(header);
                $("#modal").find("h4").text(header);
                $("#modal").find("#statusContent").text(content);
                $("#statusKabid").html('<input type="hidden" name="statusKabid" value="2">');
            });
        });
</script>
@endsection