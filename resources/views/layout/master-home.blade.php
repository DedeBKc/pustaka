<!DOCTYPE html>
<html>
  <head>
    <title>@yield('title')</title>
    <link rel="icon" href="{{ URL::to('poltek.ico') }}">

    <link rel="stylesheet" type="text/css" href="{{ URL::to('css/bootstrap3/css/bootstrap.min.css') }}">
    
    {{-- Bootstrap Offline --}}
    <link rel="stylesheet" type="text/css" href="{{ URL::to('css/font-awesome/css/font-awesome.min.css') }}">

    {{-- External Css : --}}
    <link rel="stylesheet" href="{{ URL::to('css/master_home.css') }}">
    <link rel="stylesheet" href="{{ URL::to('css/scroll.css') }}">
    @yield('css')

  </head>
  <body>

    @yield('content')

    @yield('footer')

    {{-- JQuery Offline --}}
    <script src="{{ URL::to('js/app.js') }}"></script>

    {{-- External JavaScripts : --}}
    <link rel="stylesheet" href="{{ URL::to('js/scroll.js') }}">

    @yield('scripts')
  </body>
</html>
