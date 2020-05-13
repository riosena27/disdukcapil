<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>@yield('title')</title>

    <!-- Custom Styles -->
    <link rel="stylesheet" type="text/css" href="{{url('/asset/layout/login/master_login.css')}}">

    <!-- Material Icon -->
    <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">

    <!-- Compiled and minified Materialize CSS -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/materialize/1.0.0/css/materialize.min.css">

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
                    <li class="{{Request::is('dashboard') ? 'active' : ''}}"><a href="{{url('dashboard')}}" class="teal-text">Beranda</a></li>
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

    <div class="row">
        <div class="col s8">
            <div class="container" style="margin-top:20px">
                @yield('register')
            </div>
        </div>
    </div>

    <div class="flex-center position-ref full-height">
        <div class="content">
            @yield('content')
        </div>
    </div>



    <!-- Compiled and minified Materialize JavaScript -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/materialize/1.0.0/js/materialize.min.js"></script>
    <!-- Jquery -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>

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