<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Spatie\Permission\Models\Permission;
use Spatie\Permission\Models\Role;

class UserController extends Controller
{
    public function __construct()
    {
        /*
        $this->middleware('auth');
        $this->middleware('permission:delete',['only'=>['destroy']]);
        $this->middleware('permission:show_users',['only'=>['index']]);
        $this->middleware('permission:roles_users|permissions_users',['only'=>['role','permission']]);
        $this->middleware('permission:revoke_roles_permissions',['only'=>['revokeRoles','revokeUserPermission']]);
      */
    }
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $user=User::orderBy('id','desc')->paginate(5);
        return view('Admin.user.index',[
            'users'=>$user
        ]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(User $user)
    {
        $role=Role::select('id','name')->get();
        return  view('Admin.user.role',[
            'user'=>$user,
            'role'=>$role
        ]);
    }
    public function showPermission(User $user)
    {
        $permission=Permission::select('id','name')->get();
        return  view('Admin.user.permission',[
            'user'=>$user,
            'permission'=>$permission
        ]);

    }
    public function role(User $user,Request $request)
    {
        if($user->hasRole($request->role))
        {
            return back()->with('info','Role deja  ete assigner a l\'utilisateur');
        }
        $user->assignRole($request->role);
        return back()->with('success','Role  assigner a l\'utilisateur');


    }
    public function permission(User $user,Request $request)
    {
        if($user->hasPermissionTo($request->permission))
        {
            return back()->with('info','Permission deja  ete donner a l\'utilisateur');
        }
        $user->givePermissionTo($request->permission);
        return back()->with('success','Permission donner a l\'utilisateur');

    }
    public function revokeRoles(User $user,Role $role)
    {
        if($user->hasRole($role))
        {
            $user->removeRole($role);
           return back()->with('success','Role  supprimer a l\'utilisateur');
        }
        return back()->with('info','Role  non valide');
    }
    public function revokeUserPermission(User $user,Permission $permission)
    {
        if($user->hasPermissionTo($permission))
        {
            $user->revokePermissionTo($permission);
           return back()->with('success','Permission  supprimer a l\'utilisateur');

        }
        return back()->with('info','Permission  non valide');


    }

    public function destroy(User $user)
    {
        $user->delete();
        return back()->with('danger','Utilisateur Supprimer Avec Success');

    }
}
