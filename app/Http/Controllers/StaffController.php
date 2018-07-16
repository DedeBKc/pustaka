<?php

namespace App\Http\Controllers;

use App\Staff;
use App\File;
use Illuminate\Support\Facades\Input;
use Illuminate\Http\Request;
use Carbon\Carbon;
use Auth;

class StaffController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('staff-auth.login');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('staff-auth.register');
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
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {

    }

    public function getEditStaff()
    {
        $staff = Staff::where('name', Auth::guard('staff_user')->user()->name)->first();

        return view('staff-auth.edit', compact('staff'));
    }

    public function postEditStaff()
    {

    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
      $staff = Staff::find($id);
      $staff->name = $request->name;
      $staff->slug = str_slug($request->name, $separator = '-');
      $staff->email = $request->email;
      if (Input::hasFile('image')) {
        $file = Input::file('image');
        $file->move(public_path('staff'). '/', $file->getClientOriginalName());

      $staff->image = $file->getClientOriginalName();
      }
      $staff->updated_at = \Carbon\Carbon::now('Asia/Jakarta');
      $staff->save();
      return redirect()->back();
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
