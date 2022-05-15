<?php

namespace App\Http\Controllers;

use App\Http\Middleware\CheckPermission;
use App\Http\Requests\NewRoleRequest;
use App\Models\Permission;
use App\Models\Role;
use Illuminate\Http\Request;

class RoleController extends Controller
{

    public function __construct()
    {
        $this->middleware(CheckPermission::class . ":read_role")
            ->only('index');

        $this->middleware(CheckPermission::class . ":create_role")
            ->only(['create','store']);

        $this->middleware(CheckPermission::class . ":update_role")
            ->only(['edit','update']);

        $this->middleware(CheckPermission::class . ":delete_role")
            ->only('destroy');
    }

    public function index()
    {
        return view('roles.index',[
           'roles'=>Role::all()
        ]);

    }

    public function create()
    {
        return view('roles.create',[
            'permissions'=>Permission::all()
        ]);
    }

    public function store(NewRoleRequest $request)
    {

      $role=  Role::query()->create([
            'title'=>$request->get('title')
        ]);

      $role->permissions()->attach($request->get('permissions'));
        return redirect('/roles');
    }

    public function edit(Role $role)
    {
        return view('roles.edit',[
           'role'=>$role,
            'permissions'=>Permission::all()
        ]);

    }

    public function update(NewRoleRequest $request,Role $role)
    {
        $role->update([
           'title'=>$request->get('title')
        ]);
        $role->permissions()->sync($request->get('permissions'));
        return redirect('/roles');
    }

    public function destroy(Role $role)
    {
        $role->permissions()->detach();
        $role->delete();
        return redirect('/roles');

    }
}
