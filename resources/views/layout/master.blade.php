<!DOCTYPE html>
<html>
  <head>
    <title>@yield('title')</title>
    <link rel="icon" href="{{ URL::to('poltek.ico') }}">

    {{-- Bootstrap Offline && Font Awesome --}}
    <link rel="stylesheet" type="text/css" href="{{ URL::to('css/bootstrap3/css/bootstrap.min.css') }}">
    <link rel="stylesheet" type="text/css" href="{{ URL::to('css/font-awesome/css/font-awesome.min.css') }}">

    <link rel="stylesheet" type="text/css" href="{{ URL::to('css/fileinput/css/fileinput.min.css') }}">


    {{-- JQuery Slim --}}
    <script src="{{ URL::to('js/jquery-3.2.1.slim.min.js') }}"></script>

    <!-- Sweet Alert 2 -->
    <link rel="stylesheet" href="{{ URL::to('css/sweetalert2.min.css') }}">

    {{-- External Css : --}}
    <link rel="stylesheet" href="{{ URL::to('css/scroll.css') }}">

    <style media="screen">
    .foot {
      position: absolute;
      top: 668px;
      left:120px;
      z-index: 7;
      color: #aaa;
    }

    #sentuh:hover, #aktif {
      color: #337ab7;
    }

    </style>
    @yield('css')
  </head>
  <body>

    @include('partials.sidebar')

    <div class="main">
      @yield('content')
    </div>

    @yield('footer')

    {{-- Sweetalert2 && JQuery : --}}
    <script src="{{ URL::to('js/sweetalert2.min.js') }}"></script>
    <script src="{{ URL::to('js/jquery-3.2.1.min.js') }}" type="text/javascript"></script>

    {{-- File-Input : --}}
    <script src="{{ URL::to('css/fileinput/js/fileinput.min.js') }}"></script>

    <script src="{{ URL::to('js/app.js') }}"></script>

    @yield('scripts')

     {{-- External JavaScripts : --}}
    <link rel="stylesheet" href="{{ URL::to('js/scroll.js') }}">
  </body>
</html>
