@extends('layout.master')

@section('title')
    Member | Index
@endsection
@section('css')
  <link rel="stylesheet" type="text/css" href="{{ URL::to('css/index.css') }}">
@endsection

@section('content')
@if (Route::has('login'))
  @if (Auth::guard('admin_user')->user() || Auth::guard('staff_user')->user())
  <div class="panel panel-default panel-transparent">
      <div class="panel-body">
          <h4><i class="fa fa-book"></i> DAFTAR MEMBER</h4><hr>

          <div class=row>
              <div class="col-md-6">
                  <a href="{{ route('user.create') }}" class="btn btn-primary"><i class="fa fa-plus-circle"></i> Tambah</a>
                  <a href="{{ route('user.index') }}" class="btn btn-success"><i class="fa fa-refresh"></i> Semua Data</a>
              </div>
              <div class="col-md-2">
              </div>
              <!-- Form Pencarian -->
              <div class="col-md-4">
                <form action="admin/cariuser" method="get">
                  <div class="input-group custom-search-form">
                      <input type="text" class="form-control" name="search" placeholder="Username...">
                      <span class="input-group-btn">
                          <span class="input-group-btn">
                    <button class="btn btn-default" type="submit"><i class="fa fa-search"></i> Cari</button>
                 </span>
                       </span>
                   </div>
                </form>
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
                     <td><b>ID Member</b></td>
                     <td><b>Username</b></td>
                     <td><b>Email</b></td>
                     <td colspan="2" class="text-center"><b>Actions</b></td>
                 </tr>
             </thead>
             @php
               $no= 1;
             @endphp
             @foreach($users as $user)
                 <tr>
                     <td class="text-center"> {{ $no++."." }} </td>
                     <td>{{ $user->nim }}</td>
                     <td>{{ $user->name }}</td>
                     <td>{{ $user->email }}</td>
                 <td width="30px">
                         <a href="{{ route('user.edit', $user) }}" class="btn btn-primary btn-sm" role="button"><i class="fa fa-pencil-square"></i> Edit</a>
                     </td>
                     <td width="30px">
                      <form action="{{ route('user.destroy', $user) }}" id="{{ $user->id }}" method="post" style="display: inline;">
                        {{ csrf_field() }}
                        {{ method_field('DELETE') }}
                        <button class='btn btn-sm btn-danger delete-btn'
                                type='submit'
                                data-user='{{ $user->name }}'
                                data-formid='{{ $user->id }}'>
                            <i class='fa fa-times-circle'></i> Hapus
                        </button>
                      </form>
                     </td>
                 </tr>
             @endforeach
             @include('includes.confirm_user')
          </table>
      </div>
      <!-- PAGINATION -->
              {!! $users->links() !!}
          @else
              <div class="alert alert-warning">
                  <i class="fa fa-exclamation-triangle"></i> Data Member tidak tersedia
              </div>
          @endif
      </div>
  </div>
  @endif
@endif
@endsection
