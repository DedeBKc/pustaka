@extends('layout.master')

@section('title')
    Member | Telat
@endsection
@section('css')
  <link rel="stylesheet" type="text/css" href="{{ URL::to('css/index.css') }}">
@endsection

@section('content')
<div class="panel panel-default panel-transparent">
    <div class="panel-body">
        <h4><i class="fa fa-book"></i> DAFTAR PENGEMBALIAN TERLAMBAT</h4><hr>

        <div class=row>
            <div class="col-md-6">
                <a href="/staff/create/mode-input" class="btn btn-primary"><i class="fa fa-plus-circle"></i> Tambah</a>
                <a href="/staff/borrow" class="btn btn-success"><i class="fa fa-arrow-circle-left" aria-hidden="true"></i> Back</a>
            </div>
            <div class="col-md-2">
            </div>
            <!-- Form Pencarian -->
            <div class="col-md-4">
                {!! Form::open(['method'=>'GET','url'=>'/staff/search_telat','role'=>'search'])  !!}
                <div class="input-group custom-search-form">
                  <input type="text" class="form-control" name="search" placeholder="Username...">
                  <span class="input-group-btn">
                  <span class="input-group-btn">
                    <button class="btn btn-default" type="submit"><i class="fa fa-search"></i> Cari</button>
                  </span>
                  </span>
                </div>
                 {!! Form::close() !!}
            </div>
        </div><br>

<!-- Flash Message -->
@if(Session::has('msg'))
    <div class="alert alert-info">
        <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
        <i class="fa fa-info-circle"></i> {{ Session::get('msg') }}
    </div>
@endif

@if($users->count())
    <div class="table-responsive">
      <table class="table table-bordered table-striped table-hover table-condensed tfix">
        <thead>
               <tr>
                   <td class="text-center"><b>No</b></td>
                   <td><b>Username</b></td>
                   <td><b>Judul Buku</b></td>
                   <td><b>ISBN</b></td>
                   <td><b>Tgl Pinjam</b></td>
                   <td><b>Batas Pinjam</b></td>
               </tr>
           </thead>
           @php
             $no= 1;
           @endphp
           @foreach($users as $user)
               <tr>
                   <td class="text-center"> {{ $no++."." }} </td>
                   <td> {{ $user->name }} </td>
                   <td> {{ $user->judul }} </td>
                   <td> {{ $user->isbn }} </td>
                   <td> {{ Carbon\Carbon::parse($user->created_at)->format('d-m-Y') }} </td>
                   <td> {{ Carbon\Carbon::parse($user->batas)->format('d-m-Y') }} </td>
               </tr>
           @endforeach
           @include('includes.confirm1')
        </table>
    </div>
    <!-- PAGINATION -->
            {!! $users->links() !!}
        @else
            <div class="alert alert-warning">
                <i class="fa fa-exclamation-triangle"></i> Data Pinjaman tidak tersedia
            </div>
        @endif
    </div>
</div>
@endsection


