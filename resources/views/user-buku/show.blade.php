@extends('layout.master')

@section('title')
    Buku | Detail
@endsection
@section('css')
  <link rel="stylesheet" href="{{ URL::to('css/create.css') }}">
@endsection
@section('content')
    <div class="panel panel-default">
        <div class="panel-body">
            <h4><i class="fa fa-book"></i> {{ strtoupper($buku->judul) }}</h4><hr>


              <div class="row">
                <div class="col-md-3">
                  <div class="list-group">
                    <a href="#" class="list-group-item active"><i class="fa fa-cogs"></i> MENU BUKU</a>
    				        <a href="/buku" class="list-group-item"><i class="fa fa-refresh"></i> Tampilkan Semua</a>
    				        <a href="/home" class="list-group-item"><i class="fa fa-home"></i> Home</a>
                  </div>
                </div>

                <div class="col-md-9" style="text-align: justify; color: #bbb;">
                  @if ($buku->image == "")
                    <img style="background:#555; margin-right: 8px; border: 1px solid blue; border-radius:5px;" width="140" height="150" class="pull-left" src="{{ asset('cover-books/cover-default.png') }}" alt="cover book">
                  @else
                    <img style="background:#555; margin-right: 8px; border: 1px solid blue; border-radius:5px;" width="140" height="150" class="pull-left" src="{{ asset('cover-books/'.$buku->image) }}" alt="cover book">
                  @endif
                  Buku 5 cm ini menceritakan tentang persahabatan lima orang anak muda yang menjalin persahabatan selama tujuh tahun, mereka diantaranya  bernama Arial, Riani, Zafran, Ian, dan Genta. Mereka adalah sahabat yang kompak, memiliki obsesi dan impian masing- masing, mereka selalu pergi bersama dan ketemu setiap saat. Karena bosan bertemu setiap hari, akhirnya mereka memutuskan untuk tidak saling berkomunikasi selama tiga bulan. Selama tiga bulan berpisah itulah terjadi banyak hal yang membuat hati mereka lebih kaya dari sebelumnya. Mereka adalah sahabat yang kompak, memiliki obsesi dan impian masing- masing, mereka selalu pergi bersama dan ketemu setiap saat.
                </div>
              </div>
              <br>
              <div class="row">
                <div class="col-md-8 col-lg-offset-3">
                  <div class="table-responsive">
                    <table class="table table-bordered table-condensed">
                      <tbody>
                        <tr align="center">
                          <td colspan="2"><strong>DETAIL INFORMASI</strong></td>
                        </tr>
                          <tr>
                              <td><b>ISBN</b></td>
                              <td>{{ $buku->isbn }}</td>
                          </tr>
                          <tr>
                              <td><b>Judul</b></td>
                              <td>{{ $buku->judul }}</td>
                          </tr>
                          <tr>
                              <td><b>Pengarang</b></td>
                              <td>{{ $buku->pengarang }}</td>
                          </tr>
                          <tr>
                              <td><b>Penerbit</b></td>
                              <td>{{ $buku->penerbit }}</td>
                          </tr>
                          <tr>
                              <td><b>Halaman</b></td>
                              <td>{{ $buku->halaman }}</td>
                          </tr>
                          <tr>
                              <td><b>Stok Buku</b></td>
                              @if ($buku->stok == 0)
                                <td>Stok Kosong</td>
                              @else
                                <td>{{ $buku->stok }}</td>
                              @endif
                          </tr>
                      </tbody>
                    </table>
                  </div>
                </div>

            </div>
        </div>
    </div>
@endsection
