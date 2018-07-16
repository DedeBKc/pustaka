@extends('layout.master')

@section('title')
    Buku | Index
@endsection
@section('css')
  <link rel="stylesheet" type="text/css" href="{{ URL::to('css/index.css') }}">
  <style type="text/css">
    .panel-default {
         border-color: black;
         height: 840px;
    }

    .profile {
      height: 200px;
      width: 200px;
    }

    nav.sidebar{
    height: 131%;
    }

    body,html{
    height: 102%;
    }

    .form {
      margin-top: 15px;
    }

    .tabel-borrow {
      margin-top: 15px;
    }

    .logo {
      position: relative;
      bottom: -22px;
      left: 35px;
    }

    .desc {
      position: absolute;
      top: 178px;
      left: 70px;
    }
    .desc1 {
      position: absolute;
      top: 198px;
      left: 70px;
    }

    .vl {
        border-left: 6px solid #2f5b75;
        height: 218px;
        position: absolute;
        right: -90px;
        top: 7px;
    }
  </style>
@endsection

@section('content')
@if ($haveBorrow->count())
  <div class="panel panel-default panel-transparent">
      <div class="panel-body">
          <h4><i class="fa fa-book"></i> Peminjaman Buku</h4>
          <a href="/staff/create/mode-input" class="btn btn-warning"><i class="fa fa-arrow-left" aria-hidden="true"></i> Back </a>
          <a href="" class="btn btn-primary"><i class="fa fa-refresh" aria-hidden="true"></i> Refresh </a>
          <hr>
      </div>

      @if(Session::has('success'))
          <div class="alert alert-info">
              <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
              <i class="fa fa-info-circle"></i> {{ Session::get('success') }}
          </div>
      @endif

      @if(Session::has('error'))
          <div class="alert alert-danger">
              <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
              <i class="fa fa-info-circle"></i> {{ Session::get('error') }}
          </div>
      @endif

      @if(Session::has('return-book'))
          <div class="alert alert-info">
              <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
              <i class="fa fa-info-circle"></i> {{ Session::get('return-book') }}
          </div>
      @endif

      @if(Session::has('book-has-return'))
          <div class="alert alert-danger">
              <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
              <i class="fa fa-info-circle"></i> {{ Session::get('book-has-return') }}
          </div>
      @endif

      <div class="row" style="background: #222; border-radius: 10px; height: 230px;">
        <div class="col-sm-2">
          <img src="{{ asset('logo-poltek.png') }}" width="200" height="200" class="img-responsive logo">
          <p class="desc">Library Politeknik</p><p class="desc1">&nbsp;&nbsp;Lhokseumawe</p>
          <div class="vl"></div>
        </div>
        <div class="col-sm-4 form col-sm-offset-1" style="background: #222; left: 240px; position: absolute;">
          <form action="{{ url('/staff/borrow') }}" method="post">
            {{ csrf_field() }}
            <fieldset class="form-group">
              <label for="nim">ID Member</label>
              <input type="text" name="nim" class="form-control" value="{{ $cari }}" readonly>
            </fieldset>
            <fieldset class="form-group">
              <label for="isbn">ID Buku</label>
              <input type="text" name="isbn" class="form-control">
            </fieldset>
            <button type="submit" class="btn btn-primary pull-right"><span class="glyphicon glyphicon-saved"></span> Simpan</button>
          </form>
        </div>
        <div class="col-sm-2 col-sm-offset-6" style="background: #1a1a1a; border-radius: 6px; line-height: 29px; color: #337ab7;">
          <h5>Name : <strong>{{ $checkUsers->name }}</strong></h5>
        </div>
        <div class="col-sm-2" style="background: #333; border-radius: 5px;">
            {{-- <p style="font-weight: bold; color: #337ab7;">Profile Image :</p> --}}
            <p></p>
            @if (! $checkUsers->image == "")
              <img style="background: #222; border: 2px solid #337ab7;" class="img-thumbnail img-responsive profile" alt="profile" width="250" height="200" src="{{ asset('users/'.$checkUsers->image) }}">
            @else
              <img style="background: #222; border: 2px solid #337ab7;" class="img-thumbnail img-responsive profile" alt="profile" width="250" height="200" src="{{ asset('staff/avatar.png') }}">
            @endif
            <p></p>
        </div>
      </div>

      <div class="row">
        <div class="col-sm-12 tabel-borrow">
            <div class="table-responsive">
                <table class="table table-bordered table-striped table-hover table-condensed tfix">
                  <thead>
                     <tr>
                         <td class="text-center"><b>No</b></td>
                         <td><b>Judul Buku</b></td>
                         <td><b>ISBN</b></td>
                         <td class="text-center"><b>Tgl Pinjam</b></td>
                         <td class="text-center"><b>Status</b></td>
                         <td class="text-center"><b>Batas Pinjam</b></td>
                         <td><b>Return</b></td>
                     </tr>
                   </thead>
                   @php
                     $no= 1;
                   @endphp
                   @foreach($borrows as $borrow)
                   <tr>
                       <td class="text-center"> {{ $no++."." }} </td>
                       <td> {{ $borrow->judul }} </td>
                       <td> {{ $borrow->isbn }} </td>
                       
                       {{-- tgl pinjam --}}
                       @if ($borrow->batas >= Carbon\Carbon::now())
                         <td class="text-center">{{ Carbon\Carbon::parse($borrow->created_at)->format('d-m-Y') }}</td>
                       @else
                        <td class="text-center"> {{ Carbon\Carbon::parse($borrow->created_at)->format('d-m-Y') }} </td>
                       @endif

                       {{-- Status --}}

                      @if ($borrow->status == "kembali")
                       <td class="text-center" style="background: #337ab7; color: white;">
                           <span class="glyphicon glyphicon-ok"></span>
                      @elseif (Carbon\Carbon::now()->between(Carbon\Carbon::parse($borrow->created_at),Carbon\Carbon::parse($borrow->batas)))
                        <td class="text-center">
                           {{ $borrow->status }}
                      @else
                        <td class="text-center" style="background: #e22a2a; color: white;">
                           <del>Terlambat!</del>
                      @endif
                       </td>



                       {{-- batas pinjam --}}
                       <td class="text-center">
                         @if ($borrow->batas >= Carbon\Carbon::now())
                          {{ Carbon\Carbon::parse($borrow->batas)->format('d-m-Y') }}
                          @elseif ($borrow->status == "kembali")
                          {{ Carbon\Carbon::parse($borrow->batas)->format('d-m-Y') }}
                         @elseif ($borrow->batas < Carbon\Carbon::now())
                          {{ Carbon\Carbon::parse($borrow->batas)->format('d-m-Y') }}
                       @endif
                       </td>
                       {{-- return --}}
                       <td width="80">
                          <a href="/staff/borrow/{{ $borrow->id }}/edit" class="btn btn-primary btn-sm" role="button"><i class="fa fa-undo"></i> Return</a>
                       </td>
                   </tr>
               @endforeach
            </table>
          </div>
        </div>
      </div>
  </div>
@elseif ($checkUsers)

{{-- {!!  $haveBorrow->links() !!} --}}

 <div class="panel panel-default panel-transparent">
      <div class="panel-body">
          <h4><i class="fa fa-book"></i> Peminjaman Buku</h4>
          <a href="/staff/create/mode-input" class="btn btn-warning"><i class="fa fa-arrow-left" aria-hidden="true"></i> Back </a>
          <a href="" class="btn btn-primary"><i class="fa fa-refresh" aria-hidden="true"></i> Refresh </a>
          <hr>
      </div>

      <div class="row">
        <div class="col-sm-12">
          <div class="well well-md alert-warning">
            <strong>Member : </strong>Pinjaman Masih Kosong
          </div>
        </div>
      </div>

      <div class="row" style="background: #222; border-radius: 10px; height: 230px;">
        <div class="col-sm-2">
          <img src="{{ asset('logo-poltek.png') }}" width="200" height="200" class="img-responsive logo">
          <p class="desc">Library Politeknik</p><p class="desc1">&nbsp;&nbsp;Lhokseumawe</p>
          <div class="vl"></div>
        </div>
        <div class="col-sm-4 form col-sm-offset-1" style="background: #222; left: 240px; position: absolute;">
          <form action="{{ url('/staff/borrow') }}" method="post">
            {{ csrf_field() }}
            <fieldset class="form-group">
              <label for="nim">ID Member</label>
              <input type="text" name="nim" class="form-control" value="{{ $cari }}" readonly>
            </fieldset>
            <fieldset class="form-group">
              <label for="isbn">ID Buku</label>
              <input type="text" name="isbn" class="form-control">
            </fieldset>
            <button type="submit" class="btn btn-primary pull-right"><span class="glyphicon glyphicon-saved"></span> Simpan</button>
          </form>
        </div>
        <div class="col-sm-2 col-sm-offset-6" style="background: #1a1a1a; border-radius: 6px; line-height: 29px; color: #337ab7;">
          <h5>Name : <strong>{{ $checkUsers->name }}</strong></h5>
        </div>
        <div class="col-sm-2" style="background: #333; border-radius: 5px;">
            {{-- <p style="font-weight: bold; color: #337ab7;">Profile Image :</p> --}}
            <p></p>
            @if (! $checkUsers->image == "")
              <img style="background: #222; border: 2px solid #337ab7;" class="img-thumbnail img-responsive profile" alt="profile" width="250" height="200" src="{{ asset('users/'.$checkUsers->image) }}">
            @else
              <img style="background: #222; border: 2px solid #337ab7;" class="img-thumbnail img-responsive profile" alt="profile" width="250" height="200" src="{{ asset('staff/avatar.png') }}">
            @endif
            <p></p>
        </div>
      </div>
  </div>

{{-- {!!  $haveBorrow->links() !!} --}}

@else
  <div class="panel-body">
      <h4><i class="fa fa-book"></i> Peminjaman Buku</h4>
        <a href="/staff/create/mode-input" class="btn btn-warning"><i class="fa fa-arrow-left" aria-hidden="true"></i> Back </a>
      <hr>
  </div>
  <div class="well well-md alert-warning">
    <strong>Member : </strong>Data Tidak Terdapat Dalam Record Database
  </div>
@endif

{{-- {!!  $haveBorrow->links() !!} --}}

@endsection
