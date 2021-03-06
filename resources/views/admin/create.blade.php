@extends('layout.master')

@section('title', 'Beranda')

@section('content')

<div class="row">
    <div class="col s12">
        <div class="card">
            <div class="card-content">
                <span class="card-title" style="margin-bottom: 20px">Tambah User</span>
                <form action="{{url('admin')}}" method="POST">
                    @csrf
                    <div class="row">
                        <div class="input-field col s6" style="margin: 0px">
                            <input id="email" type="email" class="validate" name="email">
                            <label for="email">Email</label>
                            <span class="helper-text" data-error="Format email a@b.com" data-success="Email ok">Isi email user yang
                                aktif</span>
                        </div>

                        <div class="input-field col s6" style="margin: 0px">
                            <input id="nama" type="text" class="validate" name="name">
                            <label for="nama">Nama Lengkap</label>
                            <span class="helper-text" data-error="Isi nama anda" data-success="Nama ok">Nama User</span>
                        </div>
                    </div>

                    <div class="row" style="margin-top: 20px">
                        <div class="input-field col s6">
                            <select multiple name="role[]">
                                <option disabled selected>Role</option>
                                @foreach ($userRole as $role)
                                <option value="{{$role->id}}">{{$role->name}}</option>
                                @endforeach
                            </select>
                            <label>Pilih Role User</label>
                        </div>

                        <div class="input-field col s6">
                            <input id="password" type="password" class="validate" name="password">
                            <label for="password">Password</label>
                            <span class="helper-text" data-error="wrong" data-success="right">Password User</span>
                        </div>
                    </div>

                    <div class="row">
                        <div class="col s12"><button type="submit" class="waves-effect waves-light btn right"><i
                            class="material-icons right">send</i>Simpan</button></div>
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
            var elems = document.querySelectorAll('select');
            var instances = M.FormSelect.init(elems);
        });
    </script>
@endsection