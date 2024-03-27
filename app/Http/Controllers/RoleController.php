<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Spatie\Permission\Models\Role;
use Illuminate\Support\Facades\Auth;
use Spatie\Permission\Models\Permission;

class RoleController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $roles = Role::all();
        $all_permissions = Permission::all();
        $permission_groups = User::getpermissionGroups();
        return view('role.index',compact('all_permissions','permission_groups','roles'));
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
        // $user = Auth::user();
        // if (is_null($user) || !$user->can('role.create')) {
        //     abort(403, 'Sorry !! You are Unauthorized to create any role !');
        // }

        // Validation Data
        $request->validate([
            'name' => 'required|max:100|unique:roles',
        ], [
            'name.requried' => 'Please give a role name'
        ]);
        $permissions = $request->input('permissions');
        if (!empty($permissions)) {
            // Process Data
            $role = Role::create(['name' => $request->name, 'guard_name' => 'web']);
            $role->syncPermissions($permissions);
        }
        else{
            return back()->with('error','Select Permissions !!');
        }
        // $role = DB::table('roles')->where('name', $request->name)->first();
        session()->flash('success', 'Role has been created !!');
        return back();
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
