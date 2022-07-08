<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;
use Spatie\Permission\Models\Permission;
use Spatie\Permission\Models\Role;

class UsersController extends Controller
{
    public function index()
    {
        $users = User::all();
        return view('admin.users.index', compact('users'));
    }
    public function show(User $user)
    {
        $roles = Role::all();
        $permissions = Permission::all();
        return view('admin.users.role', compact('user', 'roles', 'permissions'));
    }
    public function destroy(User $user)
    {
        $user->delete();
        return back()->with('message', 'User removed');
    }
    public function assignRole(Request $request, User $user)
    {
        // dd($request->role);
        if($user->hasRole($request->role)){

            return back()->with('message', 'role exists');
        }
        $user->assignRole($request->role);
        return back()->with('message', 'role assigned');
    }

    public function removeRole(User $user, Role $role)
    {
        if($user->hasRole($role)){
            $user->removeRole($role);

            return back()->with('message', 'Role Removed');
        }
        return back()->with('message', 'Role does not exist');
    }
    public function assignPermission(Request $request, User $user)
    {
        // dd($request->permission);
        if($user->hasPermissionTo($request->permission)){

            return back()->with('message', 'Permission exists');
        }
        $user->givePermissionTo($request->permission);
        return back()->with('message', 'Permission added');
    }
    public function removePermission(User $user, Permission $permission)
    {
        if($user->hasPermissionTo($permission)){
            $user->revokePermissionTo($permission);
            return back()->with('message', 'Permission revoked');
        }
        return back()->with('message', 'Permission not exist');
    }
}
