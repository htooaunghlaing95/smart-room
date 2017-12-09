<?php

namespace App\Policies;

use App\User;
use App\UserProfile;
use Illuminate\Auth\Access\HandlesAuthorization;

class UserPolicy
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

    public function modifyUser(User $user, UserProfile $profile)
    {
        //dd($user->id, $profile->id);
        return $user->id === $profile->id;

    }
}
