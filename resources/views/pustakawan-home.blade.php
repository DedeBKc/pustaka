@extends('layout.master-home')
@section('title')
	Perpustakaan | Sirkulasi
@endsection
@section('css')
  <style type="text/css">
    body {
      background-image: url('/images/master-home.png');
    }

    p {
      color : white;
      margin-left: 5px;
    }

    .thumbnail img {
      max-height: 200px;
    }


    .thumbnail {
      background: #1c1f25;
      border-radius: 20px;
      border: 2px solid #30475a;
    }

	img {
		margin-bottom: 10px;
	}

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

    a:hover {
      color: red;
    }

  </style>
@endsection
@section('content')

  <nav class="navbar navbar-inverse">
  <div class="container-fluid">
    <!-- Brand and toggle get grouped for better mobile display -->
    <div class="navbar-header">
      <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1" aria-expanded="false">
        <span class="sr-only">Toggle navigation</span>
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
      </button>
      <a href="/home" class="navbar-brand" 
        onmouseover="this.bgColor='none'; this.style.color='#337ab7'" 
        onmouseout="this.bgColor='none'; this.style.color='#9d9d9d'"><i class="fa fa-arrow-circle-left" aria-hidden="true"></i> Back
      </a>
    </div>

    <!-- Collect the nav links, forms, and other content for toggling -->
    <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
      @if (Route::has('login'))
      <ul class="nav navbar-nav navbar-right">
        @if (Auth::guard('admin_user')->user())
          @include('layouts.admin-dropdown')
        @elseif(Auth::guard('staff_user')->user())
          @include('layouts.staff-dropdown')
        @elseif(! Auth::guest())
          @include('layouts.dropdown')
        @else
          <ul class="nav navbar-nav navbar-right">
            <li class="dropdown">
              <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">User Management <span class="caret"></span></a>
              <ul style="background: rgb(66, 66, 63);" class="dropdown-menu">
                <li class="li-login"><a style="color:#fff;" href="{{ url('login') }}" class="menu-list" onMouseOver="this.style.color='#337ab7'"
     onMouseOut="this.style.color='#fff'">Login Member</a></li>
                <div style="background:#337ab7;" class="divider"></div>
                <li class="li-login"><a style="color:#fff;" href="{{ url('staff_user') }}" class="menu-list" onMouseOver="this.style.color='#337ab7'"
     onMouseOut="this.style.color='#fff'">Login Sirkulasi</a></li>
              </ul>
            </li>
            {{-- <li><a href="{{ url('register') }}">Register <i class="fa fa-user-plus" aria-hidden="true"></i></a></li> --}}
          </ul>
        @endif
      </ul>
      @endif
    </div><!-- /.navbar-collapse -->
  </div><!-- /.container-fluid -->
  </nav>

@if($pustakawan->count())
      @foreach ($pustakawan as $pp)
    {{-- <div class="col-sm-6 col-md-3"> --}}
		<div class="col-md-3 col-sm-3">
			<div class="thumbnail">
				@if ($pp->image == "")
					<img src="{{ URL::to('staff/avatar.png') }}" class="img-responsive" alt="profile" width="250" height="250">
				@else
					<img src="{{ asset('staff/'.$pp->image) }}" class="img-responsive" alt="profile" width="250" height="250">
				@endif
				<div style="color: white;" class="text-center user">Sirkulasi Profile</div>
				<div class="caption">
					<p>Name &nbsp; &nbsp; : {{ $pp->name }}</p>
					<p>Position : Sirkulasi</p>
					<p>Contact :  {{ $pp->email }}</p>
				</div>
			</div>
		</div>
    @endforeach
@else
  <div style="background: #999; height: 400px; line-height: 400px; font-size: 100px; position: relative; top: 70px;" class="alert alert-info text-center">
      <i class="fa fa-exclamation-triangle"></i> Data Sirkulasi Kosong
  </div>
@endif
@endsection