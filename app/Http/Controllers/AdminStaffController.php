<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Staff;
use App\File;
use Illuminate\Support\Facades\Input;
use App\Http\Requests\BukuRequest;
use Illuminate\Support\Facades\Session;
use Carbon\Carbon;

class AdminStaffController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $staffs = Staff::orderBy('name','ASC')->paginate(9);
        return view('admin-staff.index')->with('staffs', $staffs);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin-staff.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
      $staff = new Staff;

      $staff->name = $request->name;
      $staff->slug = str_slug($request->name, $separator = '-');
      $staff->email = $request->email;
      if (Input::hasFile('image')) {
        $file = Input::file('image');
        $file->move(public_path('staff'). '/', $file->getClientOriginalName());

      $staff->image = $file->getClientOriginalName();
      }
      $staff->password = $request->password;
      $staff->created_at = \Carbon\Carbon::now('Asia/Jakarta');
      $staff->save();

      return redirect('/admin/staff');
    }

    /**
     * Display the specified resource.
     *
     * @param  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {

    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param $id
     * @return \Illuminate\Http\Response
     */
    public function edit(Staff $staff)
    {
        return view('admin-staff.edit', compact('staff'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
      $staff = Staff::find($id);
      $staff->name = $request->name;
      $staff->slug = str_slug($request->name, $separator = '-');
      if (Input::hasFile('image')) {
        $file = Input::file('image');
        $file->move(public_path('staff'). '/', $file->getClientOriginalName());

      $staff->image = $file->getClientOriginalName();
      }
      $staff->created_at = \Carbon\Carbon::now('Asia/Jakarta');
      $staff->save();
      return redirect('/admin/staff');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $staff = Staff::findOrFail($id);
        $staff->delete();
        Session::flash('msg','Staff '.$staff->name.' Berhasil Dihapus');
        return redirect('/admin/staff');
    }

    public function search(Request $request){
        $cari = $request->get('search');
        $staffs = Staff::where('name','LIKE','%'.$cari.'%')->paginate(9);
        return view('admin-staff.index', compact('staffs'));
    }
}
