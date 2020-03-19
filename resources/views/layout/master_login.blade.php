<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>@yield('title')</title>

        <!-- Custom Styles -->
        <link rel="stylesheet" type="text/css" href="{{url('/asset/layout/login/master_login.css')}}">

        <!-- Compiled and minified Materialize CSS -->
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/materialize/1.0.0/css/materialize.min.css">
    </head>
    <body>
        <div class="flex-center position-ref full-height">

            <div class="content">
                @yield('content')
            </div>
        </div>

        <!-- Compiled and minified Materialize JavaScript -->
        <script src="https://cdnjs.cloudflare.com/ajax/libs/materialize/1.0.0/js/materialize.min.js"></script>

    </body>

    @section('javascript')
        
    @endsection
</html>
