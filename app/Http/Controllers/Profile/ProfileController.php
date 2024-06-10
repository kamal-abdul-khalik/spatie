<?php

namespace App\Http\Controllers\Profile;

use App\Actions\Fortify\UpdateUserProfileInformation;

class ProfileController extends UpdateUserProfileInformation
{
    public function edit()
    {
        return view('admin.profile.edit');
    }

    public function updateProfileInformations()
    {
        $this->update(request()->user(), request()->all());

        return redirect()->route('profile.edit')
            ->with('success', 'Profile berhasil diupdate');
    }
}
