<!DOCTYPE html>
<html lang="{{ app()->getLocale() }}">
<head>
    <title>@yield('title')</title>
    <link rel="icon" href="{{ URL::to('poltek.ico') }}">

    {{-- Bootstrap Offline --}}
    <link rel="stylesheet" type="text/css" href="{{ URL::to('css/bootstrap3/css/bootstrap.min.css') }}">
    <link rel="stylesheet" type="text/css" href="{{ URL::to('css/font-awesome/css/font-awesome.min.css') }}">

    <link rel="stylesheet" type="text/css" href="{{ URL::to('css/fileinput/css/fileinput.min.css') }}">

    <!-- Styles -->
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">

    @yield('css')

    <style type="text/css">
        .navbar-inverse .navbar-nav>li>a:hover {
            color: #337ab7;
            background-color: transparent;
        }

        .dropdown-menu>li>a:hover {
            background: transparent;
        }
    </style>

</head>
<body>
    <div id="app">
        @include('partials.navbar')
        @yield('content')
    </div>
    @yield('footer')

    {{-- Tambahan Terbaru --}}
    {{-- <script src="https://code.jquery.com/jquery-3.2.1.min.js"></script> --}}
    {{-- <script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-fileinput/4.4.5/js/fileinput.min.js"></script> --}}

    <script src="{{ URL::to('js/jquery-3.2.1.min.js') }}" type="text/javascript"></script>
    <script src="{{ URL::to('css/fileinput/js/fileinput.min.js') }}" type="text/javascript"></script>

    <!-- Scripts -->
    <script src="{{ asset('js/app.js') }}"></script>
</body>
</html>
