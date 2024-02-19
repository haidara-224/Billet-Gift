<?php

namespace App\Http\Controllers;

use App\Http\Requests\PermissionEditRequest;
use App\Http\Requests\PermissionRequest;
use Illuminate\Http\Request;
use Spatie\Permission\Models\Permission;
use Spatie\Permission\Models\Role;

class PermissionController extends Controller
{
    public function __construct()
    {

        $this->middleware('auth');
        $this->middleware('permission:show',['only'=>['index','show']]);
        $this->middleware('permission:delete',['only'=>['destroy']]);
        $this->middleware('permission:create_permission_roles',['only'=>['create','store']]);
        $this->middleware('permission:update_role_permission',['only'=>['edit','update']]);
        $this->middleware('permission:role',['only'=>['role']]);
        $this->middleware('permission:revoke_roles_permissions',['only'=>['revokeRole']]);

    }
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        $query=Permission::query();
        $input=$request->input;
        if($request->has('name'))
        {

            $query->where('name','like',"%{$request->name}%")->get();


        }
            $permissions=$query->orderBy('id','DESC')->paginate(5);
            return  view('Admin.permission.index',[
                'permissions'=>$permissions,
                'input'=>$input
            ]);

    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $permission=new Permission();
        return view('Admin.permission.form',[

            'permissions'=>$permission
        ]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(PermissionRequest $request, Permission $permission)
    {
        $validate=$request->validated();
        $permission->create($validate);
        return to_route('super.permission.index')->with('success','Permissions Creer Avec Success');
    }

    /**
     * Display the specified resource.
     */
    public function show(Permission $permission)
    {
        $role=Role::select('id','name')->get();
        return view('Admin.permission.roles',[
            'role'=>$role,
            'permission'=>$permission

        ]);

    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Permission $permission)
    {
        return view('Admin.permission.form',[
            'permissions'=>$permission
        ]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(PermissionEditRequest $request,Permission $permission)
    {
        $validate=$request->validated();
        $permission->update($validate);
        return to_route('super.permission.index')->with('success','Permissions editer Avec Success');

    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Permission $permission)
    {
        $permission->delete();
        return back()->with('danger','Permissions supprimer Avec Success');

    }
    public function role(Request $request,Permission $permission)
    {
        if($permission->hasRole($request->role))
        {
            return back()->with('info','Ce Role a deja ete attribuer a la permission');
        }
        $permission->assignRole($request->role);
        return back()->with('success','Permission attribuer avec success');
    }
    public function revokeRole(Permission $permission,Role $role)
    {
        if($permission->hasRole($role))
        {
            $permission->removeRole($role);
            return back()->with('success','Role supprimer de la permissions');
        }
        return back()->with('info','Role non existant');


    }
}
