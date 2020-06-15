<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    @include('layout.head')

</head>

<body>
    <div class="navbar-fixed">
        <nav>
            <div class="nav-wrapper white">
                <span class="left">
                    <a href="#!" class="brand-logo"><img class="responsive-img" style="height:60px"
                            src="{{url('/asset/layout/login/logobpp.png')}}"></a>
                </span>


                <ul class="hide-on-med-and-down right">
                    <li class="{{Request::is('dashboard-user') ? 'active' : ''}}"><a href="{{url('dashboard-user')}}" class="teal-text">Layanan</a></li>
                    @guest
                    <li class="{{Request::is('register') ? 'active' : ''}}"><a href="{{url('register')}}"
                            class="teal-text">Buat
                            Akun</a></li>
                    <li class="{{Request::is('/') ? 'active' : ''}}"><a href="{{url('/')}}" class="teal-text">Masuk</a>
                    </li>
                    @endguest
                    <li><a href="" class="teal-text">Status Akun</a></li>
                    @auth
                    <li class="{{Request::is('riwayat-user') ? 'active' : ''}}"><a href="{{url('riwayat-user')}}" class="teal-text">Riwayat</a></li>
                    <li><a href="{{url('logout')}}" class="red-text">Logout</a></li>
                    @endauth
                </ul>
            </div>
        </nav>
    </div>

    @yield('content')
    
    @include('layout.script')

    @yield('javascript')

    <script>
        $('.btn-show-pass').on('click', function(){
            var button = document.getElementById("password");
                if (button.type === "password") {
                    button.type = "text";
                } else {
                    button.type = "password";
                }
            
        });

    </script>

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

</body>



</html>