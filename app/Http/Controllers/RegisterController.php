<?php

namespace App\Http\Controllers;

use App\Http\Requests\RegisterRequest;
use App\Models\Role;
use App\Models\User;
use Illuminate\Http\Request;

class RegisterController extends Controller
{
    public function create()
    {
        return view('authenticate.create');
    }

    public function store(RegisterRequest $request)
    {
       $normaluser = Role::query()
       ->where('title','normal user')
           ->first();
   $user= User::query()->create([
       'role_id'=>$normaluser->id,
       'name'=>$request->get('name') ,
       'email'=>$request->get('email') ,
       'mobile'=>$request->get('mobile') ,
       'password'=>bcrypt($request->get('password'))
    ]);

   auth()->login($user);

 return redirect('/');
    }
}
