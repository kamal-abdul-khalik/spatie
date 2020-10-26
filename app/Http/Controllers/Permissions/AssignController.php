<?php

namespace App\Http\Controllers\Permissions;

use App\Http\Controllers\Controller;
use App\Models\{Permission, Role};

class AssignController extends Controller
{
    public function create()
    {
        return view('back.permissions.assign.create', [
            'roles' => Role::get(),
            'permissions' => Permission::get(),
        ]);
    }

    public function store()
    {
        request()->validate([
            'role' => 'required',
            'permissions' => 'array|required'
        ]);

        $role = Role::find(request('role'));
        $role->givePermissionTo(request('permissions'));

        return redirect()->back()
            ->with('success', "Permission has been assign to the role {$role->name}");
    }

    public function edit(Role $role)
    {
        return view('back.permissions.assign.sync', [
            'role' => $role,
            'roles' => Role::get(),
            'permissions' => Permission::get(),
        ]);
    }

    public function update(Role $role)
    {
        request()->validate([
            'role' => 'required',
            'permissions' => 'array|required'
        ]);

        $role->syncPermissions(request('permissions'));

        return redirect()->route('assign.create')
            ->with('success', "Permission has been sync to the role {$role->name}");
    }
}
