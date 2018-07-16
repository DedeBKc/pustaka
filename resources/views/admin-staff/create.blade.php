@extends('layouts.app')
@section('title')
    Admin | Staff Register
@endsection
@section('css')
  <link rel="stylesheet" href="{{ URL::to('css/auth.css') }}">
@endsection
@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-10 col-md-offset-1">
            <div class="panel panel-default">
                <div class="panel-heading">Staff Register</div>

                <div class="panel-body">
                    <form class="form-horizontal" method="post" action="/staff_user" enctype="multipart/form-data">
                      {{ csrf_field() }}

                        <div class="form-group">
                            <label for="name" class="col-md-4 control-label">Name</label>

                            <div class="col-md-6">
                                <input id="name" type="text" class="form-control" name="name" required autofocus autofocus>
                            </div>
                        </div>

                        <div class="form-group">
                            <label for="email" class="col-md-4 control-label">E-Mail Address</label>

                            <div class="col-md-6">
                                <input id="email" type="email" class="form-control" name="email" required autofocus>
                            </div>
                        </div>

                        <div class="form-group">
                            <label for="image" class="col-md-4 control-label">Profile Staff</label>

                            <div class="col-md-6">
                            <input id="image" name="image" type="file" class="file" data-show-preview="false">
                            </div>
                        </div>

                        <div class="form-group">
                            <label for="password" class="col-md-4 control-label">Password</label>

                            <div class="col-md-6">
                                <input id="password" type="password" class="form-control" name="password" required autofocus>
                            </div>
                        </div>

                        <div class="form-group">
                            <div class="col-md-6 col-md-offset-4">
                              <a href="/admin/staff" class="btn btn-danger"><span class="fa fa-arrow-circle-left"></span> Back</a>
                              <button type="submit" class="btn btn-primary"><i class="fa fa-plus-square" aria-hidden="true"></i> Register</button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
