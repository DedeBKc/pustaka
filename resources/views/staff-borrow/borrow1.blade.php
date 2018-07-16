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
  <div class="panel panel-default panel-transparent">
      <div class="panel-body">
          <h4><i class="fa fa-book"></i> Peminjaman Buku</h4>
          <a href="/staff/create/mode-input" class="btn btn-warning"><i class="fa fa-arrow-left" aria-hidden="true"></i> Back </a>
          <a href="" class="btn btn-primary"><i class="fa fa-refresh" aria-hidden="true"></i> Refresh </a>
          <hr>
      </div>

      <div class="row" style="background: #222; border-radius: 10px; height: 230px;">
        <div class="col-sm-2">
          <img src="{{ asset('logo-poltek.png') }}" width="200" height="200" class="img-responsive logo">
          <p class="desc">Library Politeknik</p><p class="desc1">&nbsp;&nbsp;Lhokseumawe</p>
          <div class="vl"></div>
        </div>
        <div class="col-sm-4 form col-sm-offset-2" style="background: #222;">
          <form action="{{ url('/staff/new_borrow') }}" method="post">
            {{ csrf_field() }}
            <fieldset class="form-group">
              <label for="nim">ID borrow</label>
                <input type="text" name="nim" class="form-control" value="">
                {{-- <input type="text" name="nim" class="form-control" value="{{ $cari }}"> --}}
            </fieldset>
            <fieldset class="form-group">
              <label for="isbn">ID Book</label>
              <input type="text" name="isbn" class="form-control">
            </fieldset>
            <button type="submit" class="btn btn-primary pull-right"><span class="glyphicon glyphicon-saved"></span> Simpan</button>
          </form>
        </div>
        <div class="col-sm-3 col-sm-offset-1" style="background: #333; border-radius: 5px;">
          <h4 style="font-family: 'Gloria Hallelujah', cursive; color: #fff;">Member Name : </h4>
          <h4 style="font-family: 'Gloria Hallelujah', cursive; color: #fff;">Member Nim &nbsp;&nbsp; : </h4>
        </div>
      </div>
  </div>
@endsection
