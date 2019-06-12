<?php

namespace App\Policies;

use App\User;
use Illuminate\Auth\Access\HandlesAuthorization;

class UserPolicy
{
    use HandlesAuthorization;

    public function isAdmin(User $user)
    {
        if (!$user->isAdmin()) {
            abort(404);
        }
        return true;
    }
    public function authorizedClient(User $user, $client)
    {
        return $user->id == $client->user_id;
    }
}
