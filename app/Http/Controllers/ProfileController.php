<?php

namespace App\Http\Controllers;

use App\Http\Middleware\CheckPermission;
use App\Http\Requests\ProfileUpdateRequest;
use App\Models\User;
use Illuminate\Http\Request;

class ProfileController extends Controller
{


    public function show()
    {

        return view('profile.show',[
          'user' => auth()->user()
        ]);

    }

    public function edit()
    {
        return view('profile.edit',[
            'user'=>auth()->user()
        ]);
    }

    public function update(ProfileUpdateRequest $request)
    {
       auth()->user()->update([
          'name'=>$request->get('name'),
          'email'=>$request->get('email'),
          'mobile'=>$request->get('mobile'),
       ]);
       return redirect('/profile');

    }
}
