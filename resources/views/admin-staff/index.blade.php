@extends('layout.master')

@section('title')
    Admin - List Sirkulasi
@endsection
@section('css')
  <link rel="stylesheet" type="text/css" href="{{ URL::to('css/index.css') }}">
@endsection

@section('content')
<div class="panel panel-default panel-transparent">
    <div class="panel-body">
        <h4><i class="fa fa-book"></i> DAFTAR SIRKULASI</h4><hr>

        <div class=row>
            <div class="col-md-6">
                <a href="/admin/staff/create" class="btn btn-primary"><i class="fa fa-plus-circle"></i> Tambah</a>
                <a href="/admin/staff" class="btn btn-success"><i class="fa fa-refresh"></i> Semua Data</a>
            </div>
            <div class="col-md-2">
            </div>
            <!-- Form Pencarian -->
            <div class="col-md-4">
                {!! Form::open(['method'=>'GET','url'=>'/admin/search','role'=>'search'])  !!}
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

@if($staffs->count())
    <div class="table-responsive">
        <table class="table table-bordered table-striped table-hover table-condensed tfix">
        <thead>
               <tr>
                   <td class="text-center"><b>No</b></td>
                   <td><b>Username</b></td>
                   <td><b>Email</b></td>
                   <td><b>Posisi</b></td>
                   <td colspan="2" class="text-center"><b>Actions</b></td>
               </tr>
           </thead>
           @php
             $no= 1;
           @endphp
           @foreach($staffs as $staff)
               <tr>
                   <td class="text-center"> {{ $no++."." }} </td>
                   <td> {{ $staff->name }} </td>
                   <td> {{ $staff->email }} </td>
                   <td> Staff / Sirkulasi </td>
                   <td width="30px">
                       <a href="{{ route('staff.edit', $staff) }}" class="btn btn-primary btn-sm" role="button"><i class="fa fa-pencil-square"></i> Edit</a>
                   </td>
                   <td width="30px">
                       {!! Form::open(array(
                            'url' => array('/admin/staff', $staff->id),
                            'method' => 'delete',
                            'id' => $staff->id,
                            'style' => 'display:inline')) !!}
                            <button class='btn btn-sm btn-danger delete-btn'
                                    type='submit'
                                    data-staff='{{ $staff->name }}'
                                    data-formid='{{ $staff->id }}'>
                                <i class='fa fa-times-circle'></i> Hapus
                            </button>
                        {!! Form::close() !!}
                   </td>
               </tr>
           @endforeach
           @include('includes.confirm_staff')
        </table>
    </div>
    <!-- PAGINATION -->
            {!! $staffs->links() !!}
        @else
            <div class="alert alert-warning">
                <i class="fa fa-exclamation-triangle"></i> Data Sirkulasi tidak tersedia
            </div>
        @endif
    </div>
</div>
@endsection
