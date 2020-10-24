<?php

namespace App\Http\Controllers\User;

use App\Authorizable;
use App\Http\Requests\UserRequest;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use App\Models\{Role, User, Permission};

class UserController extends Controller
{
    use Authorizable;

    public function index()
    {
        return view('back.user.index', [
            'users' => User::latest()->get(),
        ]);
    }

    public function create()
    {
        return view('back.user.create', [
            'roles' => Role::pluck('name', 'id'),
        ]);
    }

    public function store(UserRequest $request)
    {
        // hash password
        $request->merge(['password' => bcrypt($request->get('password'))]);

        // Create the user
        if ($user = User::create($request->except('roles', 'permissions'))) {
            $this->syncPermissions($request, $user);
            session()->flash('success', 'User has been created.');
        } else {
            session()->flash('error', 'Enable to create user.');
        }

        return redirect()->route('back.user.index');
    }

    public function edit($id)
    {
        return view('back.user.edit', [
            'user' => User::findOrFail($id),
            'roles' => Role::pluck('name', 'id'),
            'permissions' => Permission::all('name', 'id'),
        ]);
    }

    public function update(UserRequest $request, $id)
    {
        // Get the user
        $user = User::findOrFail($id);

        // Update user
        $user->fill($request->except('roles', 'permissions', 'password'));

        // check for password change
        if ($request->get('password')) {
            $user->password = bcrypt($request->get('password'));
        }

        // Handle the user roles
        $this->syncPermissions($request, $user);
        $user->save();
        return redirect()->route('back.user.index')
            ->with('info', 'User with name ' . $user['name'] . ' was updated');
    }

    public function destroy($id)
    {
        if (Auth::user()->id == $id) {
            return redirect()
                ->back()
                ->with('warning', 'Deletion of currently logged in user is not allowed :(')->important();
        }

        if (User::findOrFail($id)->delete()) {
            session()->flash('success', 'User has been deleted');
        } else {
            session()->flash('error', 'User was not deleted');
        }

        return redirect()->back();
    }

    private function syncPermissions(UserRequest $request, $user)
    {
        // Get the submitted roles
        $roles = $request->get('roles', []);
        $permissions = $request->get('permissions', []);

        // Get the roles
        $roles = Role::find($roles);

        // check for current role changes
        if (!$user->hasAllRoles($roles)) {
            // reset all direct permissions for user
            $user->permissions()->sync([]);
        } else {
            // handle permissions
            $user->syncPermissions($permissions);
        }

        $user->syncRoles($roles);
        return $user;
    }
}
