@extends('layout.master')

@section('title')
    Buku | Member Borrow
@endsection
@section('css')
  <link rel="stylesheet" type="text/css" href="{{ URL::to('css/index.css') }}">
  <style type="text/css">
    .tombol {
      margin-top: 10px;
    }

    .panel-transparent {
      height: 639px;
    }
  </style>
@endsection

@section('content')

@if (session('msg'))
    <div class="alert alert-info">
        {{ session('msg') }}
    </div>
@endif

<div class="panel panel-default panel-transparent">
    <div class="panel-body">
        <h4><i class="fa fa-book"></i> Peminjaman Buku</h4>
        <a href="/staff/borrow" class="btn btn-success"><i class="fa fa-refresh" aria-hidden="true"></i> All Borrows </a>
        <hr>
        <hr>

        @include('errors.error')

        <div class="col-md-4">
            {!! Form::open(['method'=>'GET','url'=>'/staff/data_pinjam','role'=>'search'])  !!}
            <div class="input-group custom-search-form">
              <fieldset>
                <label style="font-size: 16px;">Cari Data Member</label>
                <input style="border-radius: 10px; background: #333; color: #337ab7;" type="text" class="form-control" name="search" placeholder="ID Member...">
              </fieldset>
                <button class="btn btn-primary pull-right tombol" type="submit"><i class="fa fa-search"></i> Cari</button>
            </div>
             {!! Form::close() !!}
        </div>

    </div>
</div>
@endsection
