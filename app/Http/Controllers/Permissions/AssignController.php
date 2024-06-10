<?php

namespace App\Http\Controllers\Permissions;

use App\Authorizable;
use App\Models\{Permission, Role};
use App\Http\Controllers\Controller;

class AssignController extends Controller
{
    use Authorizable;

    public function create()
    {
        return view('admin.permissions.assign.create', [
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
        return view('admin.permissions.assign.sync', [
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

        return redirect()->route('assigns.create')
            ->with('success', "Permission has been sync to the role {$role->name}");
    }
}
