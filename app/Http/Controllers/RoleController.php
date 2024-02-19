<?php

namespace App\Http\Controllers;

use App\Http\Requests\RoleEditRequest;
use App\Http\Requests\RoleRequest;
use Illuminate\Http\Request;
use Spatie\Permission\Models\Permission;
use Spatie\Permission\Models\Role;

class RoleController extends Controller
{
    public function __construct()
    {

        $this->middleware('auth');
        $this->middleware('permission:show',['only'=>['index','show']]);
        $this->middleware('permission:delete',['only'=>['destroy']]);
        $this->middleware('permission:create_permission_roles',['only'=>['create','store']]);
        $this->middleware('permission:update_role_permission',['only'=>['edit','update']]);
        $this->middleware('permission:permission',['only'=>['permission']]);
        $this->middleware('permission:revoke_roles_permissions',['only'=>['revokePermission']]);

    }
    public function index()
    {
        $role=Role::paginate(5);
        return view('Admin.roles.index',[
            'roles'=>$role
        ]);
    }
    public function create()
    {
        $role=new Role();
        return view('Admin.roles.form',[
            'roles'=>$role
        ]);
    }
    public function store(RoleRequest $request,Role $role)
    {
        $validate=$request->validated();
        $role->create($validate);
        return to_route('super.roles.index')->with('success','Le role a ete creer avec success');

    }
    public function edit(Role $role)
    {
        return view('Admin.roles.form',[
            'roles'=>$role
        ]);

    }
    public function update(RoleEditRequest $request,Role $role)
    {
        $validate=$request->validated();
        $role->update($validate);
        return to_route('super.roles.index')->with('success','Le role a ete modifier avec success');


    }
    public function destroy(Role $role)
    {
        $role->delete();
        return to_route('super.roles.index')->with('danger','Le role a ete supprimer avec success');

    }
    public function show(Role $role)
    {
        $permission=Permission::select('id','name')->orderBy('id','DESC')->get();
        return view('Admin.roles.permissions',[
            'role'=>$role,
            'permission'=>$permission

        ]);

    }
    public function permission(Request $request,Role $role)
    {
        if($role->hasPermissionTo($request->permission))
        {
            return back()->with('info','Cette permission a deja ete attribuer au role');
        }
        $role->givePermissionTo($request->permission);
        return back()->with('success','Permission attribuer avec success');
    }
    public function revokePermission(Role $role,Permission $permission)
    {
        if($role->hasPermissionTo($permission))
        {
            $role->revokePermissionTo($permission);
            return back()->with('success','Permission supprimer du role');
        }
        return back()->with('info','Permission non existant');


    }

}
