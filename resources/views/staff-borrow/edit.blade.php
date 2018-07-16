<!DOCTYPE html>
<html>
  <head>
    <title>Konfirmasi Buku</title>
    <link rel="icon" href="{{ URL::to('poltek.ico') }}">
    <link href="{{ URL::to('css/font-edit.css') }}" rel="stylesheet">
    
    <link rel="stylesheet" type="text/css" href="{{ URL::to('css/bootstrap4/css/bootstrap.min.css') }}">
    
    <link rel="stylesheet" type="text/css" href="{{ URL::to('css/font-awesome/css/font-awesome.min.css') }}">

    <link href="{{ URL::to('css/cover_edit.css') }}" rel="stylesheet">
  </head>
  <body id="top"><div class="site-wrapper">
  <div class="site-wrapper-inner">
    <div class="cover-container">
      <div class="masthead clearfix">
        <div class="inner">
          <a href="/"><h3 class="masthead-brand">Politeknik Library</h3></a>
          <nav class="nav nav-masthead">
            <a class="nav-link nav-social" target="blank" href="https://www.facebook.com/dede.bkc"><i class="fa fa-facebook" aria-hidden="true"></i></a>
            <a class="nav-link nav-social" target="blank" href="https://twitter.com/dedebkc182"><i class="fa fa-twitter" aria-hidden="true"></i></a>
            <a class="nav-link nav-social" target="blank" href="dedekurniawan.dk67@gmail.com"><i class="fa fa-google-plus" aria-hidden="true"></i></a>
            <a class="nav-link nav-social" target="blank" href="https://www.instagram.com/dedebkc"><i class="fa fa-instagram" aria-hidden="true"></i></a>
          </nav>
        </div>
      </div><br>      <div class="inner cover">
        <h1 class="cover-heading">Perpustakaan Berbasis Web</h1>
        <p class="lead cover-copy">Perpustkaan merupakan sarana terbaik untuk mendapatkan ilmu yang mempunyai sumber yang baik dan terpercaya akan ilmunya.</p>
        <p class="lead"><button type="button" class="btn btn-lg btn-default btn-notify" data-toggle="modal" data-target="#subscribeModal">Konfirmasi!</button></p>
      </div>
      <div class="mastfoot">
        <div class="inner">
          <p>&copy; Copyright 2017 | built by <a href="/contact">Dede Kurniawan</a></p>
        </div>
      </div>
      <div class="modal fade" id="subscribeModal" tabindex="-1" role="dialog" aria-labelledby="subscribeModalLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
          <div class="modal-content">
            <div class="modal-header">
              <h5 class="modal-title" id="subscribeModalLabel">Buku Yang Akan Dikembalikan:</h5>
              <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
              </button>
            </div>
            <div class="modal-body">
              <form action="/staff/borrow/{{ $bukus->id }}" method="post">
                <input type="hidden" name="_method" value="PUT">
                {{ csrf_field() }}
                <div class="form-group">
                  <label for="nim" class="form-control-label">Nim:</label>
                  <input type="text" class="form-control" name="nim" value="{{ $bukus->nim }}" id="nim" readonly="">
                </div>
                <div class="form-group">
                  <label for="isbn" class="form-control-label">ISBN:</label>
                  <input type="text" class="form-control" name="isbn" value="{{ $bukus->isbn }}" id="isbn" readonly="">
                </div>
                <div class="form-group">
                  <label for="created_at" class="form-control-label">Created_at:</label>
                  <input type="text" class="form-control" name="created_at" value="{{ $bukus->created_at }}" id="created_at" readonly="">
                </div>
                {{-- <div class="form-group">
                  <label for="status" class="form-control-label">Return:</label>
                  @if ($bukus->updated_at == "")
                    <input type="text" class="form-control" name="status" value="{{ $bukus->status }}" id="status" readonly="">
                  @else
                    <input type="text" class="form-control" name="status" value="{{ $bukus->updated_at }}" id="status" readonly="">
                  @endif
                </div> --}}
                <div class="modal-footer">
                  <button type="submit" class="btn btn-default">Return Book !</button>
                </div>
              </form>
            </div>
          </div>
        </div>
    </div>
  </div>
</div>
    
    {{-- <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js"></script> --}}
    <script src="{{ URL::to('js/jquery-3.2.1.slim.min.js') }}"></script>
    
    {{-- <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.11.0/umd/popper.min.js"></script> --}}
    <script src="{{ URL::to('js/popper.min.js') }}"></script>
    
    {{-- <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-beta/js/bootstrap.min.js"></script> --}}
    <script src="{{ URL::to('css/bootstrap4/js/bootstrap.min.js') }}"></script>
    
    <script src="{{ URL::to('js/cover_edit.js') }}"></script>
  </body>
</html>
