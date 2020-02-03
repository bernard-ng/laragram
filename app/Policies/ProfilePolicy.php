<?php

namespace App\Policies;

use App\Profile;
use App\User;
use Illuminate\Auth\Access\HandlesAuthorization;

class ProfilePolicy
{
    use HandlesAuthorization;

    /**
     * Determine whether the user can view any profiles.
     *
     * @param User $user
     * @return mixed
     */
    public function viewAny(User $user)
    {
        return true;
    }

    /**
     * Determine whether the user can view the profile.
     *
     * @param User $user
     * @param Profile $profile
     * @return mixed
     */
    public function view(User $user, Profile $profile)
    {
        return true;
    }

    /**
     * Determine whether the user can create profiles.
     *
     * @param User $user
     * @return mixed
     */
    public function create(User $user)
    {
        return true;
    }

    /**
     * Determine whether the user can update the profile.
     *
     * @param User $user
     * @param Profile $profile
     * @return mixed
     */
    public function update(User $user, Profile $profile)
    {
        return $user->id === $profile->user_id;
    }

    /**
     * Determine whether the user can delete the profile.
     *
     * @param User $user
     * @param Profile $profile
     * @return mixed
     */
    public function delete(User $user, Profile $profile)
    {
        return $user->id === $profile->user_id;
    }

    /**
     * Determine whether the user can restore the profile.
     *
     * @param User $user
     * @param Profile $profile
     * @return mixed
     */
    public function restore(User $user, Profile $profile)
    {
        return false;
    }

    /**
     * Determine whether the user can permanently delete the profile.
     *
     * @param User $user
     * @param Profile $profile
     * @return mixed
     */
    public function forceDelete(User $user, Profile $profile)
    {
        return false;
    }
}
