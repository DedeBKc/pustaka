@extends('layout.master')

@section('title')
    Buku | Pinjam
@endsection
@section('css')
  <link rel="stylesheet" type="text/css" href="{{ URL::to('css/index.css') }}">
  <style type="text/css">
    .panel-default {
        height: 639px;
    }
  </style>
@endsection

@section('content')
<div class="panel panel-default panel-transparent">
    <div class="panel-body">
        <h4><i class="fa fa-book"></i> DAFTAR BUKU PINJAMAN</h4><hr>

        <div class="row">
          <div class="col-md-6">
              <a href="/sedang_pinjam" class="btn btn-success"><i class="fa fa-refresh"></i> Sedang Dipinjam</a>
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
                   <td><b>Judul Buku</b></td>
                   <td><b>ISBN</b></td>
                   <td><b>Tgl Pinjam</b></td>
                   <td><b>Tgl Kembali</b></td>
               </tr>
           </thead>
           @php
             $no= 1;
           @endphp
           @foreach($users as $user)
               <tr>
                   <td class="text-center"> {{ $no++."." }} </td>
                   <td> {{ $user->judul }} </td>
                   <td> {{ $user->isbn }} </td>
                   <td> {{ $user->created_at }} </td>
                   <td>
                     @if ($user->updated_at == "")
                       {{ $user->status }}
                     @else
                       {{ $user->updated_at }}
                     @endif
                   </td>
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
