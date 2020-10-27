<?php

namespace App\Policies;

use App\Models\{User, Post};
use Illuminate\Auth\Access\HandlesAuthorization;

class PostPolicy
{
    use HandlesAuthorization;

    /**
     * Create a new policy instance.
     *
     * @return void
     */
    public function __construct()
    {
        //
    }

    public function view(User $user, Post $post)
    {
        //pemilik data dapat melihat datanya sendiri, tetapi tidak dapat melihat data user lain
        return $user->id === $post->user_id;
    }

    public function create(User $user)
    {
        //diberikan argument return true karena untuk membuat data semua user diizinkan
        return $user->is($user);
    }

    public function update(User $user, Post $post)
    {
        //pemilik data dapat mengupdate datanya sendiri, tetapi tidak dapat mengupdate data user lain
        return $user->id === $post->user_id;
    }

    public function delete(User $user, Post $post)
    {
        //pemilik data dapat mendelete datanya sendiri, tetapi tidak dapat mendelete data user lain
        return $user->id === $post->user_id;
    }
}
