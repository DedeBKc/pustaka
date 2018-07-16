@extends('layout.master')

@section('title')
    Buku | Create
@endsection
@section('css')
  <link rel="stylesheet" href="{{ URL::to('css/create.css') }}">
@endsection

@section('content')


<div class="panel panel-default">
    <div class="panel-body">
	    <h4><i class="fa fa-plus-square"></i> TAMBAH BUKU</h4>
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
	        </div>

            <div class="col-md-6">
		    	<div class="panel panel-default">
	  				<div class="panel-body">

              @include('errors.listerr')

          <form method="post" action="{{ route('admin_buku.store') }}" enctype="multipart/form-data">
            {{ csrf_field() }}
						<div class="form-group">
							<label class="">ISBN Buku</label>
							<input type="text" name="isbn" class="form-control" placeholder="ISBN Buku" required autofocus>
						</div>
						<div class="form-group">
							<label class="">Judul Buku</label>
							<input type="text" name="judul" class="form-control" placeholder="Judul Buku" required autofocus>
						</div>
            <div class="form-group">
							<label class="">Pengarang Buku</label>
							<input type="text" name="pengarang" class="form-control" placeholder="Pengarang Buku" required autofocus>
						</div>
            <div class="form-group">
							<label class="">Penerbit Buku</label>
							<input type="text" name="penerbit" class="form-control" placeholder="Penerbit Buku" required autofocus>
						</div>
						<div class="form-group">
							<label class="">Halaman Buku</label>
							<input type="text" name="halaman" class="form-control" placeholder="Halaman Buku" required autofocus>
						</div>
            <div class="form-group">
							<label class="">Stok Buku</label>
							<input type="text" name="stok" class="form-control" placeholder="Stok Buku" required autofocus>
						</div>
            <div class="form-group">
							<label class="">Cover Buku</label>
              <input id="image" name="image" type="file" class="file" data-show-preview="false">
						</div>

            <button type="submit" name="button" class="btn btn-primary"><i class="fa fa-plus-square"></i> Simpan</button>
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
