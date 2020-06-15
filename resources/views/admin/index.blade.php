@extends('layout.master')

@section('title', 'Manajemen User')

@section('content')

<div class="row">
    <div class="col s12">
        <div class="card">
            <div class="card-content">
                <span class="card-title" style="margin-bottom: 12px">Manajemen User <a
                        href="{{url('admin/create-user')}}" class="waves-effect waves-light btn right"><i
                            class="material-icons right">library_add</i>Tambah Data</a></span>
                <table class="responsive-table striped" style="margin-top: 20px">
                    <thead>
                        <tr>
                            <th>No</th>
                            <th>Nama</th>
                            <th>Email</th>
                            <th>Role</th>
                            <th>Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($user as $usr)
                        <tr>
                            <td>{{$loop->iteration}}</td>
                            <td>{{$usr->name}}</td>
                            <td>{{$usr->email}}</td>
                            <td>{{implode(', ', $usr->roles()->get()->pluck('name')->toArray())}}</td>
                            <td>
                                <a href="{{url('admin/'.$usr->id.'/edit')}}" class="btn-floating btn-large waves-effect waves-light green btn-small tooltipped"
                                    data-position="top" data-tooltip="Edit" style="margin-right: 8px"><i
                                        class="material-icons">create</i></a>

                                <button data-target="modal1" data-name="{{$usr->name}}" data-url="{{url('admin/'.$usr->id)}}" class="btn-floating btn-large waves-effect waves-light red btn-small tooltipped btn modal-trigger delete-data"
                                    data-position="top" data-tooltip="Delete"><i class="material-icons"
                                        >clear</i></button>

                            </td>
                        </tr>
                        @endforeach
                    </tbody>
                </table>
                <!-- Modal Structure -->
                <form action="" method="POST" id="deleteForm">
                    @method('delete')
                    @csrf
                    <div id="modal1" class="modal">
                        <div class="modal-content">
                            <h4>Delete Data</h4>
                            <span id="delete"></span>
                        </div>
                        <div class="modal-footer">
                            <a href="#!" class="modal-close waves-effect waves-green btn-flat">Cancel</a>
                            <button type="submit" class="modal-close waves-effect waves-green btn red">Yes</button>
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
</script>
@endsection