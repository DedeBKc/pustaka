<!DOCTYPE html>
<html>
  <head>
    <title>Perpustakaan | Beranda</title>
    <link rel="icon" href="{{ URL::to('poltek.ico') }}">

    {{-- Bootstrap Offline --}}
    <link rel="stylesheet" type="text/css" href="{{ URL::to('css/bootstrap3/css/bootstrap.min.css') }}">
    <link rel="stylesheet" type="text/css" href="{{ URL::to('css/font-awesome/css/font-awesome.min.css') }}">

    <!-- Custom styles for this template -->
    <link href="{{ URL::to('css/cover.css') }}" rel="stylesheet">

    <style type="text/css">
      .dropdown-menu>li>a:hover {
      background: none;
      color: #337ab7;
      }

      .navbar-inverse .navbar-nav>li>a {
          color: #ffffff;
      }

      .navbar-inverse .navbar-nav>li>a:hover {
          color: #337ab7;
      }

      html {
        background: #1f1f1f;
      }

      body {
        background-image: url('/images/master-home.png');
      }

    </style>

  </head>

  <body>

    <div class="">
      @include('partials.navbar')

      <div class="site-wrapper-inner">

        <div class="cover-container">


          <div class="inner cover">
            <h1 class="cover-heading">Perpustakaan Online</h1>
            <p class="lead">Selamat Datang di Aplikasi Website Perpustakaan Online Politeknik Lhokseumawe. Semoga Bermanfaat Ilmu yang Didapatkan pada Aplikasi Perpustakaan Berbasis Web ini.</p>
            <p class="lead">
              <a href="home" style="width: 150px;" class="btn btn-lg btn-primary"><span class="fa fa-bullhorn"></span> Ayo Mulai!</a>
            </p>
          </div>

          <div class="mastfoot">
            <div class="inner">
              <p style="color: white;">Copyright (c) 2017 Copyright Holder All Rights Reserved.</p>
            </div>
          </div>

        </div>

      </div>

    </div>

    {{-- JQuery Offline --}}
    <script src="{{ URL::to('js/app.js') }}"></script>

  </body>
</html>
