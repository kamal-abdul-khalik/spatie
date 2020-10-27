<?php

namespace App\Http\Controllers\Permissions;

use App\Models\Role;
use App\Authorizable;
use App\Http\Controllers\Controller;

class RoleController extends Controller
{
    use Authorizable;

    public function index()
    {
        return view('back.permissions.role.index', [
            'roles' => Role::get(),
            'role' => new Role,
        ]);
    }

    public function store()
    {
        request()->validate([
            'name' => 'required',
        ]);

        Role::create([
            'name' => request('name'),
            'guard_name' => request('guard_name') ?? 'web',
        ]);

        return redirect()->back()
            ->with('success', 'Role with name ' . request('name') . ' was created');
    }

    public function edit(Role $role)
    {
        return view('back.permissions.role.edit', [
            'submit' => 'Update',
            'role' => $role,
        ]);
    }

    public function update(Role $role)
    {
        request()->validate([
            'name' => 'required',
        ]);

        $role->update([
            'name' => request('name'),
            'guard_name' => request('guard_name') ?? 'web',
        ]);

        return redirect()->route('roles.index')
            ->with('info', 'Role with name ' . $role->name . ' was updated');
    }
}
