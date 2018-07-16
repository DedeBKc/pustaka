<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;

use App\User;
use App\Http\Requests\UserRequest;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Input;
use Carbon\Carbon;

class ListUserController extends Controller
{
    public function index()
    {
        $users = \App\User::orderBy('nim','ASC')->paginate(9);
        return view('admin-user.index')->with('users', $users);
    }

    public function create()
    {
        return view('admin-user.create');
    }

    public function store(Request $request)
    {
      $users = new User;

      $users->nim = $request->nim;
      $users->name = $request->name;
      $users->slug = str_slug($request->name, $separator = '-');
      $users->email = $request->email;
      if (Input::hasFile('image')) {
        $file = Input::file('image');
        $file->move(public_path('users'). '/', $file->getClientOriginalName());

      $users->image = $file->getClientOriginalName();
      }
      $users->password = bcrypt($request->password);
      $users->created_at = \Carbon\Carbon::now('Asia/Jakarta');
      $users->save();

      return redirect(route('user.index'));
    }

    public function edit(User $user)
    {
        return view('admin-user.edit', compact('user'));
    }

    public function update(Request $request, User $user)
    {
        $user->update([
          'name' => $request->name,
          'slug' => str_slug($request->name, $separator = '-'),
        ]);
        return redirect(route('user.index'));    
    }

    public function destroy(User $user)
    {
        $user->delete();
        return redirect(route('user.index'));
    }

    public function search(Request $request){
        $cari = $request->get('search');
        $users = User::where('name','LIKE','%'.$cari.'%')->paginate(9);
        return view('admin-user.index', compact('users'));
    }

    public function profile()
    {
      $users = auth()->user();
      return view('auth.edit', compact('users'));
    }

    public function updateProfile(Request $request, $id)
    {
        $user = User::find($id);
        $user->name = $request->name;
        if (Input::hasFile('image')) {
          $file = Input::file('image');
          $file->move(public_path('users'). '/', $file->getClientOriginalName());

        $user->image = $file->getClientOriginalName();
        }
        $user->updated_at = \Carbon\Carbon::now('Asia/Jakarta');
        $user->save();
        return redirect()->back();
    }
}
