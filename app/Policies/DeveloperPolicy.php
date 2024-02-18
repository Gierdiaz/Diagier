<?php

namespace App\Policies;

use App\Models\Developer;
use App\Models\User;
use Illuminate\Auth\Access\Response;

class DeveloperPolicy
{
    /**
     * Determine whether the user can view any models.
     */
    public function viewAny(User $user)
    {
        //
    }

    /**
     * Determine whether the user can view the model.
     */
    public function view(User $user, Developer $developer): bool
    {
        return $user->access === 'admin';
    }

    /**
     * Determine whether the user can create models.
     */
    public function create(User $user): bool
    {
        return $user->access === 'admin';
    }

    /**
     * Determine whether the user can update the model.
     */
    public function update(User $user, Developer $developer): bool
    {
        return $user->access === 'admin';
    }

    /**
     * Determine whether the user can delete the model.
     */
    public function delete(User $user, Developer $developer): bool
    {
        return $user->access === 'admin';
    }

    /**
     * Determine whether the user can restore the model.
     */
    public function restore(User $user, Developer $developer)
    {
        //
    }

    /**
     * Determine whether the user can permanently delete the model.
     */
    public function forceDelete(User $user, Developer $developer)
    {
        //
    }
}
