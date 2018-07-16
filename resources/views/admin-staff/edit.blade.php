@extends('layouts.app')
@section('title')
    Admin - Edit Sirkulasi
@endsection
@section('css')
  <link rel="stylesheet" href="{{ URL::to('css/auth.css') }}">
@endsection
@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-8 col-md-offset-2">
            <div class="panel panel-default">
                <div class="panel-heading">Edit Data Sirkulasi : <strong>{{ $staff->name }}</strong></div>

                <div class="panel-body">
                    <form class="form-horizontal" method="post" action="/admin/staff/{{ $staff->id }}" enctype="multipart/form-data">
                      <input type="hidden" name="_method" value="PUT">

                      {{ csrf_field() }}

                        <div class="form-group">
                            <label for="name" class="col-md-4 control-label">Name</label>

                            <div class="col-md-6">
                                <input id="name" type="text" class="form-control" name="name" value="{{ $staff->name }}" required autofocus>
                            </div>
                        </div>

                        <div class="form-group">
                            <label for="email" class="col-md-4 control-label">E-Mail Address</label>

                            <div class="col-md-6">
                                <input id="email" type="email" class="form-control" name="email" value="{{ $staff->email }}" disabled="">
                            </div>
                        </div>

                        <div class="form-group">
                            <label for="image" class="col-md-4 control-label">Profile Sirkulasi</label>

                            <div class="col-md-6">
                            <input id="image" name="image" type="file" class="file" value="{{ $staff->image }}"  data-show-preview="false">
                            </div>
                        </div>
                        <div class="form-group">
                            <div class="col-md-6 col-md-offset-4">
                                <a href="{{ url('/admin/staff') }}" class="btn btn-danger"><i class="fa fa-arrow-left" aria-hidden="true"></i> Back</a>
                                <button type="submit" class="btn btn-primary"><i class="fa fa-pencil" aria-hidden="true"></i> Update</button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
