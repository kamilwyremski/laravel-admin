<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use App\Models\User;
use App\Models\Role;

class UserController extends Controller
{
    public function list()
    {

        $users = User::orderBy('id', 'desc')
            ->Paginate(10);

        return view('admin.user.list', compact('users'));
    }

    public function create()
    {
        return view('admin.user.add');
    }

    public function edit(User $User)
    {
        return view('admin.user.add', ['user' => $User]);
    }

    public function store(Request $request, User $User = null)
    {
        if($User){
            $password = ['confirmed'];
        }else{
            $User = new User();
            $password = ['required', 'confirmed'];
        }

        $request->validate([
            'name' => ['required'],
            'email' => ['email','required','unique:users,email,'.$User->id],
            'password' => $password,
        ]);

        $User->name = $request->name;
        $User->email = $request->email;
        if($request->password){
            $User->password = Hash::make($request->password);
        }

        $user_role = Role::where('name','user')->first();

        $User->roles()->attach($user_role);

        $User->save();

        return redirect()->route('admin_user_list')->with('flash_message', __('admin.Changes have been saved correctly'));
    }

    public function remove(User $User)
    {
        $User->delete();

        return back()->with('flash_message', __('admin.Successfully deleted'));
    }

}
