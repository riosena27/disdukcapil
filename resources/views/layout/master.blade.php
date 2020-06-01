<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    @include('layout.head')
    <!-- Custom Styles -->
    <link rel="stylesheet" type="text/css" href="{{url('/asset/layout/master.css')}}">
</head>

<body>

    <div class="sidebar-container">
        <div class="sidebar-logo">
            SIM DISDUKCAPIL
        </div>
        <ul class="sidebar-navigation">
            @can('operator')
            <li class="header">Operator</li>
            <li>
                <a href="{{url('operator')}}">
                    <i class="fa fa-home" aria-hidden="true"></i> Review
                </a>
            </li>
            <li>
                <a href="#">
                    <i class="fa fa-tachometer" aria-hidden="true"></i> Dashboard
                </a>
            </li>

            @endcan
            
            @can('admin')
            <li class="header">Admin</li>
            <li>
                <a href="{{url('admin')}}">
                    <i class="fa fa-home" aria-hidden="true"></i> Manajemen User
                </a>
            </li>
            <li>
                <a href="#">
                    <i class="fa fa-tachometer" aria-hidden="true"></i> Dashboard
                </a>
            </li>
            @endcan

            @can('kasie')
            <li class="header">Kasie</li>
            <li>
                <a href="{{url('kasie')}}">
                    <i class="fa fa-home" aria-hidden="true"></i> Review 
                </a>
            </li>
            <li>
                <a href="#">
                    <i class="fa fa-tachometer" aria-hidden="true"></i> Dashboard
                </a>
            </li>
            @endcan

            @can('kabid')
            <li class="header">Kabid</li>
            <li>
                <a href="{{url('kabid')}}">
                    <i class="fa fa-home" aria-hidden="true"></i> Review 
                </a>
            </li>
            <li>
                <a href="#">
                    <i class="fa fa-tachometer" aria-hidden="true"></i> Dashboard
                </a>
            </li>
            @endcan

            @can('kadis')
            <li class="header">Kadis</li>
            <li>
                <a href="{{url('kadis')}}">
                    <i class="fa fa-home" aria-hidden="true"></i> Review 
                </a>
            </li>
            <li>
                <a href="#">
                    <i class="fa fa-tachometer" aria-hidden="true"></i> Dashboard
                </a>
            </li>
            @endcan
            
            
        </ul>
    </div>

    <div class="content-container">
        <div class="row" style="margin-bottom: 0">
            <div class="col s12">
                <div class="card">
                    <div class="card-content right-align">
                        {{Auth::user()->name}} <a class="red-text" style="margin-left: 5px" href="{{url('logout')}}">Logout</a> 
                    </div>
                </div>
            </div>
        </div>
        @yield('content')
    </div>


    @include('layout.script')

    @yield('javascript')

    <script>
        @if(session('success'))     
        new Noty({
            text: '{{ session('success') }}',
            type: 'success'
        }).show();
        @endif

    </script>

    <script>
        @if(session('update'))     
        new Noty({
            text: "{{ session('update') }}",
            type: 'warning'
        }).show();
        @endif
    </script>

    <script>
        @if(session('delete'))     
        new Noty({
            text: "{{ session('delete') }}",
            type: 'error'
        }).show();
        @endif
    </script>

    <script>
        document.addEventListener('DOMContentLoaded', function() {
            var elems = document.querySelectorAll('.tooltipped');
            var instances = M.Tooltip.init(elems);
            });
    </script>
    
    <script>
        $(document).ready(function () {
            $('.delete-data').click(function () {
                var url = $(this).attr('data-url');
                var nama = $(this).attr('data-name');
                console.log(nama);
                $("#modal1").find(".modal-content").find("#delete").text("Apakah anda ingin menghapus data " + nama + "?");
                $("#deleteForm").attr("action", url);
            });
        });
    </script>

</body>

</html>