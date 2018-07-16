@extends('layout.master')

@section('title')
    Member | Edit
@endsection
@section('css')
  <link rel="stylesheet" href="{{ URL::to('css/create.css') }}">
@endsection

@section('content')


<div class="panel panel-default">
    <div class="panel-body">
        <h4><i class="fa fa-plus-square"></i> UPDATE MEMBER</h4>
        <hr>
        <div class="row">
            <div class="col-md-3">
                <div class="list-group">
                  <a href="#" class="list-group-item active">
                    <i class="fa fa-cogs"></i> MENU MEMBER
                  </a>
                  <a href="{{ route('user.index') }}" class="list-group-item"><i class="fa fa-refresh"></i> Tampilkan Semua</a>
                  <a href="/home" class="list-group-item"><i class="fa fa-home"></i> Home</a>
                </div>
            </div>

            <div class="col-md-6">
                <div class="panel panel-default">
                    <div class="panel-body">

                        @include('errors.listerr')

                        <form action="{{ route('user.update', $user) }}" method="post">
                          <input type="hidden" name="_method" value="PUT">
                          {{ csrf_field() }}
                        <div class="form-group">
                            <label class="">NIM Member</label>
                            <input type="text" name="nim" class="form-control" value="{{ $user->nim }}" placeholder="NIM Member" required autofocus readonly>
                        </div>
                        <div class="form-group">
                            <label class="">Nama Member</label>
                            <input type="text" name="name" class="form-control" value="{{ $user->name }}" placeholder="Nama Member" required autofocus>
                        </div>
                        <div class="form-group">
                            <label class="">E-Mail Member</label>
                            <input type="email" name="email" class="form-control" value="{{ $user->email }}" placeholder="E-Mail Member" disabled="">
                        </div>

                        <button type="submit" name="button" class="btn btn-primary"><i class="fa fa-plus-square"></i> Update</button>
                        <button type="reset" name="button" class="btn btn-danger"><i class="fa fa-times"></i> Reset</button>

                      </form>

                    </div>
                </div>
            </div>
        </div>
    </div>
    <br><br><br>
</div>

@endsection
