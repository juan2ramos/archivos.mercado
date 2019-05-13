<?php

namespace App\Policies;

use App\User;
use Illuminate\Auth\Access\HandlesAuthorization;

class UserPolicy
{
    use HandlesAuthorization;


    public function view(User $user, User $model)
    {
        //
    }


    public function create(User $user)
    {
        //
    }


    public function update(User $user)
    {
        dd('llego');
    }


    public function delete(User $user, User $model)
    {
        //
    }


    public function restore(User $user, User $model)
    {

    }

    public function forceDelete(User $user, User $model)
    {
        //
    }

    public function isAdmin(User $user)
    {
        if (!$user->isAdmin()) {
            abort(404);
        }
        return true;
    }
}
