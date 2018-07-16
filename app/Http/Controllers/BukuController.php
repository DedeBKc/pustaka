<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;

use App\Buku;
use App\Http\Requests\BukuRequest;
use Illuminate\Support\Facades\Session;
use DB;
use Auth;

class BukuController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $bukus = \App\Buku::orderBy('isbn','ASC')->paginate(9);
        return view('user-buku.index')->with('bukus', $bukus);
    }

    public function list_pinjam()
    {
        $users = DB::table('users')
        ->join('buku_user', 'users.nim', '=', 'buku_user.nim')
        ->join('bukus', 'bukus.isbn', '=', 'buku_user.isbn')
        ->select('buku_user.nim', 'users.name', 'bukus.judul', 'bukus.isbn', 'buku_user.created_at', 'buku_user.updated_at', 'buku_user.status', 'buku_user.id')
        ->where('name', Auth::user()->name)
        ->paginate(15);

        return view('user-buku.list_pinjam', ['users' => $users]);
    }

    /**
     * Display the specified resource.
     *
     * @param  $isbn
     * @return \Illuminate\Http\Response
     */
    public function show(Buku $buku)
    {
        // $buku = Buku::findOrFail($isbn);
        return view('user-buku.show', compact('buku'));
    }

    public function search(Request $request){
        $cari = $request->get('search');
        $bukus = Buku::where('judul','LIKE','%'.$cari.'%')->paginate(9);
        return view('user-buku.index', compact('bukus'));
    }

    public function sedang_pinjam()
    {
        $users = DB::table('users')
        ->join('buku_user', 'users.nim', '=', 'buku_user.nim')
        ->join('bukus', 'bukus.isbn', '=', 'buku_user.isbn')
        ->select('buku_user.nim', 'users.name', 'bukus.judul', 'bukus.isbn', 'buku_user.created_at', 'buku_user.updated_at', 'buku_user.status', 'buku_user.id')
        ->where('name', Auth::user()->name)
        ->whereRaw("buku_user.created_at < now() AND buku_user.updated_at IS NULL")
        ->paginate(15);

        return view('user-buku.sedang_pinjam', ['users' => $users]);
    }

}
