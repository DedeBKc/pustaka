@extends('layout.master')

@section('title')
    Buku | Update
@endsection
@section('css')
  <link rel="stylesheet" href="{{ URL::to('css/create.css') }}">
@endsection

@section('content')


<div class="panel panel-default">
    <div class="panel-body">
	    <h4><i class="fa fa-plus-square"></i> UPDATE BUKU</h4>
	    <hr>
        <div class="row">
	    	<div class="col-md-3">
				<div class="list-group">
				  <a href="#" class="list-group-item active">
				    <i class="fa fa-cogs"></i> MENU BUKU
				  </a>
				  <a href="{{ route('admin_buku.index') }}" class="list-group-item"><i class="fa fa-refresh"></i> Tampilkan Semua</a>
				  <a href="/home" class="list-group-item"><i class="fa fa-home"></i> Home</a>
				</div>
				@if ($buku->image == "")
                    <img style="background:#555; margin-right: 8px; border: 1px solid blue; border-radius:5px;" width="250" height="250" class="pull-left" src="{{ asset('cover-books/cover-default.png') }}" alt="cover book">
                  @else
                    <img style="background:#555; margin-right: 8px; border: 1px solid blue; border-radius:5px;" width="250" height="250" class="pull-left" src="{{ asset('cover-books/'.$buku->image) }}" alt="cover book">
                  @endif
	        </div>

            <div class="col-md-6">
		    	<div class="panel panel-default">
	  				<div class="panel-body">

              @include('errors.listerr')

          <form method="post" action="{{ route('admin_buku.update', $buku->isbn) }}" enctype="multipart/form-data">
          <input type="hidden" name="_method" value="PUT">
            {{ csrf_field() }}
						<div class="form-group">
							<label class="">ISBN Buku</label>
							<input type="text" name="isbn" class="form-control" value="{{ $buku->isbn }}" placeholder="ISBN Buku" required autofocus>
						</div>
						<div class="form-group">
							<label class="">Judul Buku</label>
							<input type="text" name="judul" class="form-control" value="{{ $buku->judul }}" placeholder="Judul Buku" required autofocus>
						</div>
            <div class="form-group">
							<label class="">Pengarang Buku</label>
							<input type="text" name="pengarang" class="form-control" value="{{ $buku->pengarang }}" placeholder="Pengarang Buku" required autofocus>
						</div>
            <div class="form-group">
							<label class="">Penerbit Buku</label>
							<input type="text" name="penerbit" class="form-control" value="{{ $buku->penerbit }}" placeholder="Penerbit Buku" required autofocus>
						</div>
						<div class="form-group">
							<label class="">Halaman Buku</label>
							<input type="text" name="halaman" class="form-control" value="{{ $buku->halaman }}" placeholder="Halaman Buku" required autofocus>
						</div>
            <div class="form-group">
							<label class="">Stok Buku</label>
							<input type="text" name="stok" class="form-control" value="{{ $buku->stok }}" placeholder="Stok Buku" required autofocus>
						</div>
            <div class="form-group">
							<label class="">Cover Buku</label>
              <input id="image" name="image" type="file" class="file" value="{{ $buku->image }}" data-show-preview="false">
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
