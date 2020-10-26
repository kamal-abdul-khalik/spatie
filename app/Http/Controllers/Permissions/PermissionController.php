<?php

namespace App\Http\Controllers\Permissions;

use App\Models\Permission;
use App\Http\Controllers\Controller;

class PermissionController extends Controller
{
    public function index()
    {
        return view('back.permissions.permission.index', [
            'permissions' => Permission::get(),
            'permission' => new Permission,
        ]);
    }

    public function store()
    {
        request()->validate([
            'name' => 'required',
        ]);

        Permission::create([
            'name' => request('name'),
            'guard_name' => request('guard_name') ?? 'web',
        ]);

        return redirect()->back()
            ->with('success', 'Permission with name ' . request('name') . ' was created');
    }

    public function edit(Permission $permission)
    {
        return view('back.permissions.permission.edit', [
            'submit' => 'Update',
            'permission' => $permission,
        ]);
    }

    public function update(Permission $permission)
    {
        request()->validate([
            'name' => 'required',
        ]);

        $permission->update([
            'name' => request('name'),
            'guard_name' => request('guard_name') ?? 'web',
        ]);

        return redirect()->route('permissions.index')
            ->with('info', 'Permission with name ' . $permission->name . ' was updated');
    }
}
