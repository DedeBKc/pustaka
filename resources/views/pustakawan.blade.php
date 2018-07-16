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

  </style>
@endsection
@section('content')

  @include('partials.navbar')
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