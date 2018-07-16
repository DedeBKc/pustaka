<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Http\Request;
use Validator, Input, Redirect;
use DB;
use App\User;
use App\Buku;
use App\Staff;
use App\BukuUser;
use Carbon\Carbon;
use Illuminate\Support\Facades\Session;

class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $users = DB::table('users')
        ->join('buku_user', 'users.nim', '=', 'buku_user.nim')
        ->join('bukus', 'bukus.isbn', '=', 'buku_user.isbn')
        ->select('buku_user.nim', 'users.name', 'bukus.judul', 'bukus.isbn', 'buku_user.created_at', 'buku_user.updated_at', 'buku_user.status', 'buku_user.id')->paginate();

        return view('staff-borrow.list_borrow', ['users' => $users]);
    }

    public function mode_input()
    {
        return view('staff-borrow.borrow');
    }

    public function create()
    {
        // Input Option
        $users = User::all();
        $bukus = Buku::all();
        return view('staff-borrow.borrow1', compact('users', 'bukus'));
    }

    public function store(Request $request)
    {
        $this->validate($request, [
            'nim' => 'required',
            'isbn' => 'required'
        ]);

        if (DB::select("SELECT isbn,stok FROM bukus WHERE stok > 0 AND isbn = '$request->isbn' ")) {

          $borrow = DB::table('buku_user')->insert([
              'nim' => $request->nim,
              'isbn' => $request->isbn,
              'created_at' => \Carbon\Carbon::now('Asia/Jakarta'),
              'batas' => \Carbon\Carbon::now('Asia/Jakarta')->addDays(5),
              'status' => 'Not Return Yet',
          ]);
          DB::table('bukus')->where('isbn', $request->isbn)->decrement('stok');
          Session::flash('success', 'Buku '.$request->isbn.' Berhasil Disimpan');
          return redirect()->back();

        } else {
          Session::flash('error', 'Buku '.$request->isbn.' Stok Kosong');
          return redirect()->back();
        }
    }

    public function save(Request $request)
    {
        $this->validate($request, [
            'nim' => 'required',
            'isbn' => 'required'
        ]);

          $borrow = DB::table('buku_user')->insert([
              'nim' => $request->nim,
              'isbn' => $request->isbn,
              'created_at' => \Carbon\Carbon::now('Asia/Jakarta'),
              'batas' => \Carbon\Carbon::now('Asia/Jakarta')->addDays(5),
              'status' => 'Not Return Yet',
          ]);
          DB::table('bukus')->where('isbn', $request->isbn)->decrement('stok');
          Session::flash('msg', 'Buku '.$request->isbn.' Berhasil Disimpan');


          return redirect('/staff/create/mode-input');
    }

    public function show($id)
    {
        //
    }

    public function edit($id)
    {
      $bukus = BukuUser::findOrFail($id);

      return view('staff-borrow.edit', compact('bukus'));
    }

    public function update(Request $request, $id)
    {
        if (DB::select("SELECT isbn,status FROM buku_user WHERE status = 'Not Return Yet' AND isbn = '$request->isbn' ")) {
          $users = BukuUser::findOrFail($id);
          $users->status = "kembali";
          $users->updated_at = \Carbon\Carbon::now('Asia/Jakarta');
          $users->update($request->all());

          DB::table('bukus')->where('isbn', $request->isbn)->increment('stok');
          Session::flash('return-book','Buku '.$request->judul.' Berhasil Dikembalikan');
        }
        else {
          Session::flash('book-has-return','Buku '.$request->judul.' Sudah Dikembalikan');
        }

        return redirect("/staff/data_pinjam?search=$request->nim");
    }

    public function destroy($isbn)
    {
        $user = BukuUser::findOrFail($isbn);
        $user->delete();
        // Session::flash('msg','Buku '.$user->judul.' Berhasil Dihapus');
        return redirect('/staff/borrow');
    }

    public function search_borrow(Request $request){
        $cari = $request->get('search');

        $users = DB::table('users')
        ->join('buku_user', 'users.nim', '=', 'buku_user.nim')
        ->join('bukus', 'bukus.isbn', '=', 'buku_user.isbn')
        ->select('users.name', 'bukus.judul', 'bukus.isbn', 'buku_user.created_at', 'buku_user.updated_at', 'buku_user.status', 'buku_user.id')
        ->where('name','LIKE','%'.$cari.'%')->paginate();

        return view('staff-borrow.list_borrow', ['users' => $users]);
    }

    public function search_telat(Request $request){
        $cari = $request->get('search');

        // $users = DB::table('users')
        // ->join('buku_user', 'users.nim', '=', 'buku_user.nim')
        // ->join('bukus', 'bukus.isbn', '=', 'buku_user.isbn')
        // ->select('buku_user.batas', 'users.name', 'bukus.judul', 'bukus.isbn', 'buku_user.created_at', 'buku_user.updated_at', 'buku_user.status', 'buku_user.id')
        // ->where('name','LIKE','%'.$cari.'%')->paginate();

        $users = DB::table('users')
        ->join('buku_user', 'users.nim', '=', 'buku_user.nim')
        ->join('bukus', 'bukus.isbn', '=', 'buku_user.isbn')
        ->select('buku_user.batas' ,'buku_user.nim', 'users.name', 'bukus.judul', 'bukus.isbn', 'buku_user.created_at', 'buku_user.updated_at', 'buku_user.status', 'buku_user.id')
        ->whereRaw("buku_user.batas < now() AND buku_user.updated_at IS NULL AND name LIKE '%$cari%'")
        ->paginate();

        return view('staff-borrow.list_telat', ['users' => $users]);
    }

    public function search(Request $request)
    {
        $cari = $request->get('search');

        $borrows = DB::table('users')
        ->join('buku_user', 'users.nim', '=', 'buku_user.nim')
        ->join('bukus', 'bukus.isbn', '=', 'buku_user.isbn')
        ->select('buku_user.batas','users.image', 'users.nim', 'users.name', 'bukus.judul', 'bukus.isbn', 'buku_user.created_at', 'buku_user.updated_at', 'buku_user.status', 'buku_user.id')
        ->where('users.nim', '=', $cari)
        ->orWhere('users.name', '=', $cari)
        ->paginate(99);

        $users = DB::table('users')
        ->join('buku_user', 'users.nim', '=', 'buku_user.nim')
        ->join('bukus', 'bukus.isbn', '=', 'buku_user.isbn')
        ->select('buku_user.batas','users.image', 'users.nim', 'users.name', 'bukus.judul', 'bukus.isbn', 'buku_user.created_at', 'buku_user.updated_at', 'buku_user.status', 'buku_user.id')
        ->where('users.nim', '=', $cari)
        ->orWhere('users.name', '=', $cari)
        ->first();

        $checkUsers = User::where('nim', '=', $cari)->first();

        if ($haveBorrow = BukuUser::where('nim', '=', $cari)) {
          return view('staff-borrow.show-borrow', ['haveBorrow' => $haveBorrow, 'borrows' => $borrows, 'cari' => $cari, 'users' => $users, 'checkUsers' => $checkUsers]);
        }
    }

    public function telat()
    {
        $users = DB::table('users')
        ->join('buku_user', 'users.nim', '=', 'buku_user.nim')
        ->join('bukus', 'bukus.isbn', '=', 'buku_user.isbn')
        ->select('buku_user.batas' ,'buku_user.nim', 'users.name', 'bukus.judul', 'bukus.isbn', 'buku_user.created_at', 'buku_user.updated_at', 'buku_user.status', 'buku_user.id')
        ->whereRaw("buku_user.batas < now() AND buku_user.updated_at IS NULL")
        ->paginate();

        return view('staff-borrow.list_telat', ['users' => $users]);
    }
}