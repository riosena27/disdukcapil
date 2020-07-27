@extends('layout.master_login')

@section('title', 'Akta Kelahiran')

@section('content')

<div class="container" style="margin-top: 18px">
    <div class="card">
        <div class="card-content">
            <span class="card-title">Profil Pengguna</span>

            <form action="{{url('profil/'.$user->id)}}" method="POST">
                @method('put')
                @csrf

                <div class="row" style="margin-left:0;margin-right:0">
                    <div class="input-field col s12">
                        <input id="name" type="text" class="validate" name="name" value="{{old('name', $user->name)}}" required>
                        <label for="name">Nama Anda</label>
                        <span class="helper-text left-align" data-error="Nama lengkap tidak boleh kosong">isi nama lengkap anda
                            anda.</span>
                    </div>
                </div>


                <div class="row" style="margin:0">
                    <div class="input-field col s12">
                        <select id="select" name="jenis_kelamin" required>
                            <option value="" disabled selected> Pilih Jenis Kelamin Anda</option>
                            <option value="Laki-Laki" {{$user->jenis_kelamin == 'Laki-Laki' ? 'selected' : ''}}>Laki-laki</option>
                            <option value="Wanita" {{$user->jenis_kelamin == 'Wanita' ? 'selected' : ''}}>Wanita</option>
                        </select>
                        <label>Jenis Kelamin</label>
                    </div>
                </div>

                <div class="row" style="margin:0">
                    <div class="input-field col s12">
                        <input id="tempat_lahir" type="text" class="validate" name="tempat_lahir" value="{{old('tempat_lahir', $user->tempat_lahir)}}" required>
                        <label for="tempat_lahir">Tempat Lahir</label>
                        <span class="helper-text left-align">Tempat lahir anda.</span>
                    </div>
                </div>

                <div class="row" style="margin:0">
                    <div class="input-field col s12">
                        <input id="tanggal_lahir" type="text" class="datepicker" name="tanggal_lahir" value="{{old('tanggal_lahir', $user->tanggal_lahir)}}" required>
                        <label for="tanggal_lahir">Tanggal Lahir</label>
                        <span class="helper-text left-align">Tanggal lahir anda.</span>
                    </div>
                </div>

                <div class="row" style="margin:0">
                    <div class="input-field col s12">
                        <input id="no_hp" type="number" class="validate" name="no_hp" value="{{old('no_hp', $user->no_hp)}}" required>
                        <label for="no_hp">No. Handphone</label>
                        <span class="helper-text left-align" data-error="cth: 0812214214">Gunakan nomor handphone anda
                            yang sedang aktif.</span>
                    </div>

                </div>

                <div class="row" style="margin:0">
                    <div class="input-field col s12">
                        <input id="email" type="email" class="validate" name="email" value="{{old('email', $user->email)}}" required>
                        <label for="email">Email</label>
                        <span class="helper-text left-align" data-error="cth email: fad@gmail.com"
                            data-success="right">Gunakan email anda yang valid.</span>
                    </div>
                </div>

                <div class="row" style="margin:0">
                    <div class="input-field col s12">
                        <input id="password" type="password" class="validate" name="password"> 
                        <label for="password">Password</label>
                        <span class="btn-show-pass">
                            <i class="material-icons">
                                remove_red_eye
                            </i>
                        </span>
                    </div>
                </div>

                <div class="row right-align">
                    <div class="col s12">
                        <button type="submit" class="waves-effect waves-light btn">Ubah Data<i
                                class="material-icons right">edit</i></button>
                    </div>
                </div>

            </form>

            
        </div>
    </div>
</div>

@endsection

@section('javascript')
<script>
    document.addEventListener('DOMContentLoaded', function () {
        var elems = document.querySelectorAll('select');
        var instances = M.FormSelect.init(elems);
    });

    document.addEventListener('DOMContentLoaded', function() {
        var currYear = (new Date()).getFullYear();
        var elems = document.querySelectorAll('.datepicker');

        var instances = M.Datepicker.init(elems, {
            defaultDate: new Date(currYear,1,31),
            maxDate: new Date(currYear,12,31),
            yearRange: [1930, currYear],
        });
    });

</script>
@endsection