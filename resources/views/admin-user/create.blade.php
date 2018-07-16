@extends('layout.master')

@section('title')
    Member | Create
@endsection
@section('css')
  <link rel="stylesheet" href="{{ URL::to('css/create.css') }}">
@endsection

@section('content')


<div class="panel panel-default">
    <div class="panel-body">
        <h4><i class="fa fa-plus-square"></i> TAMBAH MEMBER</h4>
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

                        <form action="{{ route('user.store') }}" method="post" enctype="multipart/form-data">
                        {{ csrf_field() }}
                        <div class="form-group">
                            <label class="">NIM Member</label>
                            <input type="text" name="nim" class="form-control" placeholder="NIM Member" required autofocus>
                        </div>
                        <div class="form-group">
                            <label class="">Nama Member</label>
                            <input type="text" name="name" class="form-control" placeholder="Nama Member" required autofocus>
                        </div>
                        <div class="form-group">
                            <label class="">E-Mail Member</label>
                            <input type="email" name="email" class="form-control" placeholder="E-Mail Member" required autofocus>
                        </div>
                        <div class="form-group">
                            <label for="image" class="col-md-4 control-label">Profile User</label>
                            <input id="image" name="image" type="file" class="file" data-show-preview="false">
                        </div>
                        <div class="form-group">
                            <label class="">Password Member</label>
                            <input type="password" name="password" class="form-control" placeholder="Password Member" required autofocus>
                        </div>

                        {!! Form::button('<i class="fa fa-plus-square"></i>'. ' Simpan', array('type' => 'submit', 'class' => 'btn btn-primary'))!!}
                        {!! Form::button('<i class="fa fa-times"></i>'. ' Reset', array('type' => 'reset', 'class' => 'btn btn-danger'))!!}

                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <br><br><br>
</div>
@endsection
