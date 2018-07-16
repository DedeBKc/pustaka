<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;

use App\Buku;
use App\Http\Requests\BukuRequest;
use Illuminate\Support\Facades\Session;
use Carbon\Carbon;
use App\File;
use Illuminate\Support\Facades\Input;

class AdminBukuController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $bukus = \App\Buku::orderBy('isbn','ASC')->paginate(9);
        return view('admin-buku.index')->with('bukus', $bukus);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin-buku.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @return \Illuminate\Http\Response
     */
    public function store(BukuRequest $request)
    {
        $this->validate($request, [
            // 'isbn' => 'required|integer',
            'halaman' => 'required|integer',
        ]);

        $cekISBN = Buku::where('isbn','=',$request->isbn);
        if($cekISBN->count()){
            Session::flash('err_msg','ISBN : '.$request->isbn.' Sudah Dipakai');
            return redirect('/admin/buku/create')->withInput();
        }else{
          $buku = new Buku;

          $buku->isbn = $request->isbn;
          $buku->judul = $request->judul;
          $buku->slug = str_slug($request->judul, $separator = '-');
          $buku->pengarang = $request->pengarang;
          $buku->penerbit = $request->penerbit;
          $buku->halaman = $request->halaman;
          $buku->stok = $request->stok;
          if (Input::hasFile('image')) {
            $file = Input::file('image');
            $file->move(public_path('cover-books'). '/', $file->getClientOriginalName());

          $buku->image = $file->getClientOriginalName();
          }
          $buku->created_at = \Carbon\Carbon::now('Asia/Jakarta');
          $buku->save();

            Session::flash('msg','Buku '.$request->judul.' Berhasil Ditambahkan');
            return redirect('/admin/buku');
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  $isbn
     * @return \Illuminate\Http\Response
     */
    public function show($isbn)
    {
        $buku = Buku::findOrFail($isbn);
        return view('admin-buku.show', compact('buku'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param $isbn
     * @return \Illuminate\Http\Response
     */
    public function edit($isbn)
    {
        $buku = Buku::findOrFail($isbn);
        return view('admin-buku.edit', compact('buku'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  $isbn
     * @return \Illuminate\Http\Response
     */
    public function update(BukuRequest $request, $isbn)
    {
        $buku = Buku::find($isbn);
        $buku->isbn = $request->isbn;
        $buku->judul = $request->judul;
        $buku->slug = str_slug($request->judul, $separator = '-');
        $buku->pengarang = $request->pengarang;
        $buku->penerbit = $request->penerbit;
        $buku->halaman = $request->halaman;
        $buku->stok = $request->stok;
        if (Input::hasFile('image')) {
        $file = Input::file('image');
        $file->move(public_path('cover-books'). '/', $file->getClientOriginalName());

        $buku->image = $file->getClientOriginalName();
        }
        $buku->updated_at = \Carbon\Carbon::now('Asia/Jakarta');
        $buku->save();
        return redirect(route('admin_buku.index'));
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  $isbn
     * @return \Illuminate\Http\Response
     */
    public function destroy($isbn)
    {
        $buku = Buku::findOrFail($isbn);
        $buku->delete();
        Session::flash('msg','Buku '.$buku->judul.' Berhasil Dihapus');
        return redirect('/admin/buku');
    }

    public function search(Request $request){
        $cari = $request->get('search');
        $bukus = Buku::where('judul','LIKE','%'.$cari.'%')->paginate(9);
        return view('admin-buku.index', compact('bukus'));
    }
}
