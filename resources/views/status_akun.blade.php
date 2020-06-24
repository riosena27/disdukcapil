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

            @isset($akta)
                <h5>Hasil Pencarian kode <b>{{$kode}}</b> @if ($akta->status_kabid == 3)
                    <span class="new badge green" data-badge-caption="Disetujui"></span>
                @elseif($akta->status_operator == 2)
                    <span class="new badge red" data-badge-caption="Ditolak petugas"></span>
                @else
                <span class="new badge orange" data-badge-caption="Diproses"></span>
                @endif</h5>
                
                <ul>
                    <li>No Resi: {{$kode}}</li>
                    <li>Jenis Permohonan: Akta Kelahiran</li>
                    <li>Nama Anak: {{$akta->nama_anak}}</li>
                    <li>Dibuat pada: {{$akta->created_at}}</li>
                </ul>
            @endisset
            
        </div>

    </div>

</div>

@endsection