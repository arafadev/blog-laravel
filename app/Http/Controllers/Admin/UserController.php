<?php

namespace App\Http\Controllers\Admin;

use App\Models\User;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class UserController extends Controller
{
    public function index()
    {
        $users = User::all();
        return view('admin.users.index', compact('users'));
    }
    public function edit($user_id)
    {
        $user = User::find($user_id);
        return view('admin.users.edit', compact('user'));
    }
    public function update(Request $request,  $user_id)
    {
        $user = User::find($user_id);
        if($user){

            $user->role_as = $request->role_as;
            $user->update();
            return redirect('admin/users')->with('message', 'User Updated Successfully');
        }else{
            return redirect('admin/users');
        }

    }
}
