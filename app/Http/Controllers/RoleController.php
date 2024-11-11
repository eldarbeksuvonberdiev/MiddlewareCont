<?php

namespace App\Http\Controllers;

use App\Models\Role;
use App\Http\Controllers\Controller;
use App\Models\Permission;
use App\Models\PermissionGroup;
use App\Models\RoleUser;
use Illuminate\Http\Request;

class RoleController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $roles = Role::orderBy('id','desc')->paginate(10);
        $permissions = Permission::all();
        return view('role.index',['models'=>$roles]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $permissionGroups = PermissionGroup::all();
        return view('role.create',['permissionGroups' => $permissionGroups]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $role = ['name' => $request->name];

        $role  = Role::create($role);
        
        $permissions = $request->permissions;

        $role->permissions()->attach($permissions);
        return redirect()->route('role.index');
    }

    /**
     * Display the specified resource.
     */
    public function show(Role $role)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Role $role)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Role $role)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Role $role)
    {
        //
    }
}
