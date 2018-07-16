@extends('layout.master-home')
@section('title')
  Perpustakaan | About Me
@endsection
@section('css')

  <link rel="stylesheet" href="{{ URL::to("css/style.css") }}">
  <link rel="stylesheet" href="{{ URL::to('css/master_home.css') }}">

  <style type="text/css">
    .back-to-top {
    cursor: pointer;
    position: fixed;
    bottom: 20px;
    right: 20px;
    display:none;
    z-index: 3;
  }

  html {
    background: #1f1f1f;
  }

  body {
    background-image: url('/images/master-home.png');
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

    <!-- Pembuka Jumbotron -->
    <div class="jumbotron text-center">
      <img src={{ URL::to("images/eren.png") }} class="img-circle">
      <h1>Dede Kurniawan</h1>
      <p>Mahasiswa | Web Developer | Designer</p>
    </div>
    <!-- Penutup Jumbotron -->

    <!-- Pembuka About -->
    <section class="about" id="about">
      <div class="container">
        <div class="row">
          <div class="col-sm-12">
            <h1 class="text-center">About</h1>
            <hr>
          </div>
        </div>
        <div class="row">
          <div class="col-sm-5 col-sm-offset-1">
            <p class="text-justify">Namanya adalah Dede Kurniawan, Lahir di Lhokseumawe, 12 Desember 1997, ia adalah anak kedua dari dua bersaudara, buah dari pasangan Armiya dan Darmiati. Dede adalah panggilan akrabnya, ia terlahir di keluarga yang sangat sederhana, Ayahnya seorang Pegawai Kantor Pos di Panton Labu, sedangkan Ibunya bekerja sebagai Ibu Rumah Tangga. Sejak kecil dia selalu di nasehati oleh ayahnya untuk selalu rajin beribadah, jujur dan baik terhadap sesama. Ketika berumur 6 tahun, ia memulai pendidikan di SDN 1 Tanah Jambo Aye, Panton Labu, kemudian setelah lulus dia melanjutkan pendidikannya di SMPN 1 Tanah Jambo Aye di tahun 2009. Selepas lulus dari SMP di tahun 2012, dia mengikuti Ayahnya tinggal di kota Alue ie Puteh dan melanjutkan pendidikannya di SMAN 1 Baktiya, Alue ie Puteh.</p>
          </div>
          <div class="col-sm-5">
            <p class="text-justify">Dia memiliki cita-cita dalam beberapa tahun mendatang dapat bergabung dengan Tim Academy Patriot di Panton Labu dan membawa harum nama Aceh di Tingkat Nasional. Pemain yang berposisi sebagai Gelandang ini juga memiliki cita-cita untuk memberangkatkan Haji kedua orang tuanya yang sudah merawatnya sejak kecil di kemudian hari. Tahun 2015 lalu, dia berhasil menjuarai lomba Sepak Bola antar Prodi se-Kampus Politeknik Negeri Lhokseumawe dan pernah juga masuk Dunia Musik yaitu Menjadi Anak Band pada Tahun 2010 ketika dia masih tinggal di Kota Panton Labu. Dan Saat ini dia tinggal di jalan Darussalam no 7. bersama orang tua dan seorang kakak yang baru saja menyelesaikan bangku perkliahannya di Kampus Unsyiah, Banda Aceh. Mungkin itulah profil singkat dari dia yaitu Dede Kurniawan.</p>
          </div>
        </div>
      </div>
    </section>
    <!-- Penutup About -->

    <!-- Awal Portfolio -->
      <section class="portfolio" id="portfolio">
        <div class="container">
          <div class="row">
            <div class="col-sm-12">
              <h1 class="text-center">Portfolio</h1>
              <hr>
            </div>
            <div class="col-sm-4">
              <a class="thumbnail"><img src={{ URL::to("images/gambar1.png") }}></a>
            </div>
            <div class="col-sm-4">
              <a class="thumbnail"><img src={{ URL::to("images/gambar2.png") }}></a>
            </div>
            <div class="col-sm-4">
              <a class="thumbnail"><img src={{ URL::to("images/gambar3.png") }}></a>
            </div>
            <div class="col-sm-4">
              <a class="thumbnail"><img src={{ URL::to("images/gambar4.png") }}></a>
            </div>
            <div class="col-sm-4">
              <a class="thumbnail"><img src={{ URL::to("images/gambar5.png") }}></a>
            </div>
            <div class="col-sm-4">
              <a class="thumbnail"><img src={{ URL::to("images/gambar6.png") }}></a>
            </div>
          </div>
        </div>
      </section>
    <!-- Penutup Portfolio -->

    <!-- Pembuka Contact -->
    <section class="contact" id="contact">
      <div class="container">
        <div class="row" class="text-center">
          <div class="col-sm-12">
            <h1 class="text-center">Contact</h1>
            <hr>
          </div>
          <div class="col-sm-8 col-sm-offset-2">
            <form>
                  <div class="form-group">
                    <label for="nama">Masukkan Nama</label>
                    <input type="text" class="form-control" id="nama" placeholder="Dede Kurniawan" readonly=" ">
                  </div>
                  <div class="form-group">
                    <label for="email">Masukkan Email</label>
                    <input type="email" class="form-control" id="email" placeholder="dedekurniawan.dk67@gmail.com" readonly="">
                  </div>
                  <div class="form-group">
                    <label for="kategori">Hobi</label>
                    <select class="form-control">
                      <option>Sepak Bola</option>
                      <option>Sepak Takraw</option>
                      <option>Futsal</option>
                      <option>Musik</option>
                      <option>Nonton</option>
                      <option>Membaca</option>
                    </select>
                  </div>
                  <div class="form-group">
                    <label for="Alamat">Alamat</label>
                    <textarea class="form-control" rows="10" readonly="" placeholder="Lhokseumawe, Hagu Selatan. Jl. Darussalam"></textarea>
                  </div>
                  <a style="text-decoration:none;" href="{{ url('/') }}"><button style="width:130px;" type="button" name="button" class="btn btn-primary center-block"><span class="fa fa-arrow-circle-left"></span> Back</button></a>
            </form>
          </div>
        </div>
      </div>
    </section>
    <!-- Penutup Contact -->

      <a id="back-to-top" href="#" class="btn btn-primary btn-lg back-to-top" role="button" title="Back to Top" data-toggle="tooltip" data-placement="left"><span class="glyphicon glyphicon-chevron-up"></span></a>

    <!-- Pembuka Footer -->
      <footer>
        <div class="container text-center">
          <div class="row">
            <div class="col-sm-12">
              <p><i class="glyphicon glyphicon-copyright-mark"></i> Copyright 2017 | built by <a href="">Dede Kurniawan</a>.</p>
            </div>
          </div>
        </div>
      </footer>
    <!-- Penutup Footer -->

    @section('scripts')
      <script type="text/javascript">
      $(document).ready(function(){
     $(window).scroll(function () {
            if ($(this).scrollTop() > 50) {
                $('#back-to-top').fadeIn();
            } else {
                $('#back-to-top').fadeOut();
            }
        });
        // scroll body to 0px on click
        $('#back-to-top').click(function () {
            $('#back-to-top').tooltip('hide');
            $('body,html').animate({
                scrollTop: 0
            }, 800);
            return false;
        });

        $('#back-to-top').tooltip('show');
    });
    </script>
    @endsection
@endsection
