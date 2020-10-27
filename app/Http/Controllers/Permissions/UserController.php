<?php

namespace App\Http\Controllers\Permissions;

use App\Authorizable;
use App\Models\{User, Role};
use App\Http\Controllers\Controller;

class UserController extends Controller
{
    use Authorizable;

    public function index()
    {
        return view('back.user.index', [
            'users' => User::get(),
        ]);
    }

    public function create()
    {
        return view('back.permissions.assign.user.create', [
            'roles' => Role::get(),
            'users' => User::has('roles')->get(),
        ]);
    }

    public function store()
    {
        request()->validate([
            'email' => 'required|email',
            'roles' => 'array|required'
        ]);

        $user = User::where('email', request('email'))->first();
        if ($user == null) {
            return redirect()->back()
                ->with('error', request('email') . ' tidak ditemukan dalam database');
        }

        $user->assignRole(request('roles'));
        return redirect()->back()
            ->with('success', "{$user->email} has been assign to the role ");
    }

    public function edit(User $user)
    {
        return view('back.permissions.assign.user.edit', [
            'user' => $user,
            'roles' => Role::get(),
            'users' => User::has('roles')->get(),
        ]);
    }

    public function update(User $user)
    {
        $user->syncRoles(request('roles'));

        return redirect()->route('assign.user.create')
            ->with('success', "{$user->email} has been sync to the role ");
    }
}
