@extends('layout.master')

@section('title')
    Perpustakaan | Home
@endsection
@section('css')
  <link rel="stylesheet" href="{{ URL::to('css/create.css') }}">
  <style>
  .carousel-inner > .item > img,
  .carousel-inner > .item > a > img {
      width: 100%;
      height: 545px;
      margin: auto;
  }

  .hom, .kah {
  	background: #333;
  	color: #ccc;
  }

  .kah:hover {
    background: rgb(102, 172, 207);
  }

  .input-group {
  	margin-bottom: 12px;
  }

  .head {
    position: relative;
    top: -315px;
  }

  .fto {
    margin-top: 10px;
    color: #aaa;
  }

  .col-md-offset-3 {
    margin-top: 15px;
  }

  .slide {
    border-radius: 4px;
  }

  </style>
@endsection
@section('content')

  @if (Auth::guard('admin_user')->user() || Auth::guard('staff_user')->user())
    <div style="margin-top: 10px;" class="col-md-6 col-md-offset-3">
  		{!! Form::open(['method'=>'GET','url'=>'staff/caribuku','role'=>'search'])  !!}
  		<div class="input-group custom-search-form">
  		  <input type="text" class="form-control hom" name="search" placeholder="Book Title...">
  		  <span class="input-group-btn">
  		  <span class="input-group-btn">
  		            <button class="btn btn-default kah" type="submit"><i class="fa fa-search"></i></button>
  			        </span>
  		  </span>
  		</div>
  		 {!! Form::close() !!}
  	</div>
  @else
    <div class="col-md-6 col-md-offset-3">
      {!! Form::open(['method'=>'GET','url'=>'/caribuku','role'=>'search'])  !!}
      <div class="input-group custom-search-form">
        <input type="text" class="form-control hom" name="search" placeholder="Book Title...">
        <span class="input-group-btn">
        <span class="input-group-btn">
                  <button class="btn btn-default kah" type="submit"><i class="fa fa-search"></i></button>
                </span>
        </span>
      </div>
       {!! Form::close() !!}
    </div>
  @endif

  <div id="myCarousel" class="carousel slide">
    <!-- Indicators -->
    <ol class="carousel-indicators">
      <li class="item1 active"></li>
      <li class="item2"></li>
      <li class="item3"></li>
      <li class="item4"></li>
    </ol>

    <!-- Wrapper for slides -->
    <div class="carousel-inner" role="listbox">

      <div class="item active">
        <img class="img-responsive slide" src="{{ URL::to('images/slide1.png') }}" alt="Chania">
        <div class="carousel-caption">

          <h3 class="text-center head" style="text-decoration: underline; color: #eee;">Selamat Datang di Aplikasi Manajemen Perpustakaan Berbasis Web (online)</h3>

          <h3 style="color: #ddd">George Eliot</h3>
          <p style="color: #ddd">Our deeds determine us, as much as we determine our deeds.</p>
        </div>
      </div>

      <div class="item">
        <img class="img-responsive slide" src="{{ URL::to('images/slide2.png') }}" alt="Chania">
        <div class="carousel-caption">

          <h3 class="text-center head" style="text-decoration: underline; color: #eee;">Selamat Datang di Aplikasi Manajemen Perpustakaan Berbasis Web (online)</h3>

          <h3 style="color: #ddd">Chania</h3>
          <p style="color: #ddd">The atmosphere in Chania has a touch of Florence and Venice.</p>
        </div>
      </div>

      <div class="item">
        <img class="img-responsive slide" src="{{ URL::to('images/slide3.png') }}" alt="Flower">
        <div class="carousel-caption">

          <h3 class="text-center head" style="text-decoration: underline; color: #eee;">Selamat Datang di Aplikasi Manajemen Perpustakaan Berbasis Web (online)</h3>

          <h3 style="color: #ddd">Nothing Impossible!</h3>
          <p style="color: #ddd">We Can Do Everything, Trust to Yourself.</p>
        </div>
      </div>

      <div class="item">
        <img class="img-responsive slide" src="{{ URL::to('images/slide4.png') }}" alt="Flower">
        <div class="carousel-caption">

          <h3 class="text-center head" style="text-decoration: underline; color: #eee;">Selamat Datang di Aplikasi Manajemen Perpustakaan Berbasis Web (online)</h3>

          <h3 style="color: #ddd">Flowers</h3>
          <p style="color: #ddd">Beautiful flowers in Kolymbari, Crete.</p>
        </div>
      </div>

    </div>

    <!-- Left and right controls -->
    <a class="left carousel-control" role="button">
      <span class="glyphicon glyphicon-chevron-left" aria-hidden="true"></span>
      <span class="sr-only">Previous</span>
    </a>
    <a class="right carousel-control" role="button">
      <span class="glyphicon glyphicon-chevron-right" aria-hidden="true"></span>
      <span class="sr-only">Next</span>
    </a>
  </div>
@endsection

@section('scripts')
	<script>
$(document).ready(function(){
    // Activate Carousel
    $("#myCarousel").carousel({interval: 3000});

    // Enable Carousel Indicators
    $(".item1").click(function(){
        $("#myCarousel").carousel(0);
    });
    $(".item2").click(function(){
        $("#myCarousel").carousel(1);
    });
    $(".item3").click(function(){
        $("#myCarousel").carousel(2);
    });
    $(".item4").click(function(){
        $("#myCarousel").carousel(3);
    });

    // Enable Carousel Controls
    $(".left").click(function(){
        $("#myCarousel").carousel("prev");
    });
    $(".right").click(function(){
        $("#myCarousel").carousel("next");
    });
});
</script>
@endsection
