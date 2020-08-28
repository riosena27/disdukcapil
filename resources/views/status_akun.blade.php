@extends('layout.master_login')

@section('title', 'Akta Kelahiran')

@section('content')

<div class="container" style="margin-top: 18px">

    <div class="card">

        <div class="card-content">
            <h4>Cek Status Permohonan</h4>
            <div class="row">

                <form action="{{url('status-akun/cari')}}" method="GET">
                <div class="input-field col s6">
                    <i class="material-icons prefix">search</i>
                    <input type="text" id="cekStatus" class="validate" name="kode_resi">
                    <label for="cekStatus">Masukkan no resi permohonan anda</label> 
                    
                </div>
                <div class="input-field col s6" style="margin-top: 24px">
                    <button type="submit" class="waves-effect waves-light btn">Cari</button>
                </div>
            </form>
            </div>

            @isset($item)
                <h5>Hasil Pencarian kode <b>{{$kode}}</b></h5>
                
                <table class="responsive-table striped" style="margin-top: 20px">
                    <thead>
                        <tr>
                            <th>Nama yang dimohonkan</th>
                            <th style="text-align: center">Status Operator</th>
                            <th style="text-align: center">Status Kasie</th>
                            <th style="text-align: center">Status Kabid</th>
                            <th style="text-align: center">Status Kadis</th>
                            <th>Jenis Pemohonan</th>
                            <th>Tanggal</th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr>
                            <td>{{$item->nama_anak}}</td>
                            <td class="center-align">
                                @isset($item->status_operator)
                                    @if ($item->status_operator == 1)
                                    <span class="new badge orange" data-badge-caption="Diproses"></span> <br>
                                    @isset($item->$item->operator->name)    
                                    {{$item->operator->name}}
                                    @endisset
                                @elseif($item->status_operator == 2)
                                    <span class="new badge red" data-badge-caption="Ditolak"></span> <br>
                                    {{$item->operator->name}}
                                @else
                                    <span class="new badge green" data-badge-caption="Disetujui"></span> <br>
                                    {{$item->operator->name}}
                                @endif
                                @endisset
                            
                            </td>
                            <td class="center-align">
                                @isset($item->status_kasie)
                                    @if ($item->status_kasie == 1)
                                    <span class="new badge orange" data-badge-caption="Diproses"></span> <br>
                                    @isset($item->kasie->name)    
                                        {{$item->kasie->name}}
                                    @endisset
                                    @elseif($item->status_kasie == 2)
                                        <span class="new badge red" data-badge-caption="Ditolak"></span> <br>
                                        @isset($item->kasie->name)    
                                        {{$item->kasie->name}}
                                        @endisset
                                    @else
                                        <span class="new badge green" data-badge-caption="Disetujui"></span> <br>
                                        @isset($item->kasie->name)    
                                        {{$item->kasie->name}}
                                    @endisset
                                    @endif
                                @endisset
                            </td>
                            <td class="center-align">
                                @isset($item->status_kabid)
                                    @if ($item->status_kabid == 1)
                                    <span class="new badge orange" data-badge-caption="Diproses"></span> <br>
                                    @isset($item->kabid->name)    
                                    {{$item->kabid->name}}
                                    @endisset    
                                    @elseif($item->status_kabid == 2)
                                        <span class="new badge red" data-badge-caption="Ditolak"></span> <br>
                                        @isset($item->kabid->name)    
                                    {{$item->kabid->name}}
                                    @endisset   
                                    @else
                                        <span class="new badge green" data-badge-caption="Disetujui"></span> <br>
                                        @isset($item->kabid->name)    
                                    {{$item->kabid->name}}
                                    @endisset   
                                    @endif
                                @endisset
                            </td>
                            <td class="center-align">
                                @isset($item->status_kadis)
                                    @if ($item->status_kadis == 1)
                                    <span class="new badge orange" data-badge-caption="Diproses"></span> <br>
                                        @isset($item->kadis->name)    
                                        {{$item->kadis->name}}
                                        @endisset   
                                    @elseif($item->status_kadis == 2)
                                        <span class="new badge red" data-badge-caption="Ditolak"></span> <br>
                                        @isset($item->kadis->name)    
                                        {{$item->kadis->name}}
                                        @endisset   
                                    @else
                                        <span class="new badge green" data-badge-caption="Disetujui"></span> <br>
                                        @isset($item->kadis->name)    
                                        {{$item->kadis->name}}
                                        @endisset   
                                    @endif
                                @endisset
                            </td>
                            <td>Akta Kelahiran</td>
                            <td>{{$item->created_at->format('d-m-yy')}}</td>
                        </tr>
                    </tbody>
                </table>
            @endisset
            
        </div>

    </div>

</div>

@endsection