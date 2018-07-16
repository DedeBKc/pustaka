@extends('layout.master')

@section('title')
    Sirkulasi | Profile
@endsection
@section('css')

    <link rel="stylesheet" type="text/css" href="{{ URL::to('css/fileinput/css/fileinput.min.css') }}">

	<link rel="stylesheet" href="{{ URL::to('css/create.css') }}">
@endsection

@section('content')


<div class="panel panel-default">
    <div class="panel-body">
	    <h4><i class="fa fa-user-circle" aria-hidden="true"></i> PROFILE SIRKULASI</h4>
	    <hr>
        <div class="row">
            <div class="col-md-6 col-md-offset-1">
		    	<div class="panel panel-default">
	  				<div class="panel-body">

              @include('errors.listerr')

					<form method="post" action="/staff_user/{{ $staff->id }}" enctype="multipart/form-data">
                      <input type="hidden" name="_method" value="PUT">

                      {{ csrf_field() }}

						<div class="form-group">
							<label class="">Name</label>
							<input type="text" name="name" class="form-control" value="{{ $staff->name }}"  required autofocus>
						</div>
						<div class="form-group">
							<label class="">Email</label>
							<input type="email" name="email" class="form-control" value="{{ $staff->email }}"  required autofocus readonly>
						</div>
						<div class="form-group">
							<label class="">Profile</label>
							<input id="image" name="image" type="file" class="file" value="{{ $staff->image }}"  data-show-preview="false">
						</div>
							<button type="submit" name="button" class="btn btn-primary"><i class="fa fa-plus-square"></i> Update</button>
	                        <button type="reset" name="button" class="btn btn-danger"><i class="fa fa-times"></i> Reset</button>
						</form>
					</div>
				</div>
			</div>
			<div class="col-md-3">
				<p style="font-weight: bold; color: #337ab7;">Profile Image :</p>
				<img style="background: #333;" class="img-thumbnail img-responsive" alt="profile" width="250" height="250" src="{{ $staff->image }}">
			</div>
        </div>
    </div>
    <br><br><br>
</div>

@endsection
