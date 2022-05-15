<?php

namespace App\Http\Controllers;

use App\Http\Middleware\CheckPermission;
use App\Models\Role;
use App\Models\User;
use Illuminate\Http\Request;

class UserController extends Controller
{

    public function __construct()
    {
        $this->middleware(CheckPermission::class . ":read_user")
            ->only('index');

        $this->middleware(CheckPermission::class . ":create_user")
            ->only(['create','store']);

        $this->middleware(CheckPermission::class . ":update_user")
            ->only(['edit','update']);

        $this->middleware(CheckPermission::class . ":delete_user")
            ->only('destroy');
    }


    public function index()
    {
        $users = User::all();
        return view('users.index',[
            'users'=>$users
        ]);

    }

    public function Edit(User $user)
    {
        $roles = Role::all();
        return view('users.edit',[
           'user'=>$user,
            'roles'=>$roles
        ]);


    }

    public function update(Request $request,User $user)
    {


        $user->update([
         'role_id'=>$request->get('role_id'),
         'name'=>$request->get('name'),
         'email'=>$request->get('email'),
         'mobile'=>$request->get('mobile'),

        ]);
        return redirect('/users');
    }

    public function destroy(User $user)
    {
        $user->delete();
        return redirect('/users');

    }
}
