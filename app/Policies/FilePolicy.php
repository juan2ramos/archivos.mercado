<?php

namespace App\Policies;

use App\User;
use Illuminate\Auth\Access\HandlesAuthorization;

class FilePolicy
{
    use HandlesAuthorization;

    function canSee(User $user, $file)
    {
        return $user->isAdmin() ? true : $user->client->id === $file->client_id;
    }
}
