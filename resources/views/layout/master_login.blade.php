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

</body>



</html>