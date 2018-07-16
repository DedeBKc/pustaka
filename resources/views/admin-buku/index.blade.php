@extends('layout.master')

@section('title')
    Buku | Index
@endsection
@section('css')
  <link rel="stylesheet" type="text/css" href="{{ URL::to('css/index.css') }}">
@endsection

@section('content')
<div class="panel panel-default panel-transparent">
    <div class="panel-body">
        <h4><i class="fa fa-book"></i> DAFTAR BUKU</h4><hr>

        <div class=row>
            <div class="col-md-6">
                <a href="{{ route('admin_buku.create') }}" class="btn btn-primary"><i class="fa fa-plus-circle"></i> Tambah</a>
                <a href="{{ route('admin_buku.index') }}" class="btn btn-success"><i class="fa fa-refresh"></i> Semua Data</a>
            </div>
            <div class="col-md-2">
            </div>
            <!-- Form Pencarian -->
            <div class="col-md-4">
                {!! Form::open(['method'=>'GET','url'=>'/admin/caribuku','role'=>'search'])  !!}
                <div class="input-group custom-search-form">
                  <input type="text" class="form-control" name="search" placeholder="Book Title...">
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

@if($bukus->count())
    <div class="table-responsive">
        <table class="table table-bordered table-striped table-hover table-condensed tfix">
        <thead>
               <tr>
                   <td class="text-center"><b>No</b></td>
                   <td><b>ISBN</b></td>
                   <td><b>Judul Buku</b></td>
                   <td><b>Pengarang</b></td>
                   <td><b>Penerbit</b></td>
                   <td colspan="3" class="text-center"><b>Actions</b></td>
               </tr>
           </thead>
           @php
             $no= 1;
           @endphp
           @foreach($bukus as $buku)
               <tr>
                   <td class="text-center"> {{ $no++."." }} </td>
                   <td> {{ $buku->isbn }} </td>
                   <td> {{ $buku->judul }} </td>
                   <td> {{ $buku->pengarang }} </td>
                   <td> {{ $buku->penerbit }} </td>
                   <td width="30px">
                       <a href="{{ route('admin_buku.show', $buku->isbn) }}" class="btn btn-info btn-sm" role="button"><i class="fa fa-info-circle"></i> Detail</a>
                   </td>
                   <td width="30px">
                       <a href="{{ route('admin_buku.edit', $buku->isbn) }}" class="btn btn-warning btn-sm" role="button"><i class="fa fa-pencil-square"></i> Edit</a>
                   </td>
                   <td width="30px">
                      <form action="{{ route('admin_buku.destroy', $buku->isbn) }}" method="post" style="display: inline;" id="{{ $buku->isbn }}">
                        {{ csrf_field() }}
                        {{ method_field('DELETE') }}
                        <button class='btn btn-sm btn-danger delete-btn'
                                type='submit'
                                data-judulbuku='{{ $buku->judul }}'
                                data-formid='{{ $buku->isbn }}'>
                            <i class='fa fa-times-circle'></i> Hapus
                        </button>
                      </form>
                   </td>
               </tr>
           @endforeach
           @include('includes.confirm')
        </table>
    </div>
    <!-- PAGINATION -->
            {!! $bukus->links() !!}
        @else
            <div class="alert alert-warning">
                <i class="fa fa-exclamation-triangle"></i> Data Buku tidak tersedia
            </div>
        @endif
    </div>
</div>
@endsection
