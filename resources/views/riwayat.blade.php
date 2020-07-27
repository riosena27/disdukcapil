@extends('layout.master')

@section('title', 'Riwayat')

@section('content')


    
    <div class="col s12">
        <div class="card">
            <div class="card-content">
                <span class="card-title" style="margin-bottom: 12px">Riwayat</span>
                <table class="responsive-table striped" style="margin-top: 20px">
                    <thead>
                        <tr>
                            <th>No</th>
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
                        @foreach ($akta as $item)
                        <tr>
                            <td>{{$loop->iteration}}</td>
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
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>



@endsection
