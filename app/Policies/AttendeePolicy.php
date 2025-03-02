<?php

namespace App\Policies;

use App\Models\Attendee;
use App\Models\User;
use Illuminate\Auth\Access\Response;

class AttendeePolicy
{
    /**
     * Determine whether the user can view any models.
     * Controller method = index
     */
    public function viewAny(?User $user): bool
    {
        return true;
    }

    /**
     * Determine whether the user can view the model.
     * Controller method = show
     */
    public function view(?User $user, Attendee $attendee): bool
    {
        return true;
    }

    /**
     * Determine whether the user can create models.
     * Controller method = create, store
     */
    public function create(User $user): bool
    {
        return true;
    }

    /**
     * Determine whether the user can delete the model.
     * Controller method = destory
     */
    public function delete(User $user, Attendee $attendee): bool
    {
        return $user->id === $attendee->event->user_id ||
                $user->id === $attendee->user_id;
    }

    /**
     * Determine whether the user can restore the model.
     */
    public function restore(User $user, Attendee $attendee): bool
    {
        return false;
    }

    /**
     * Determine whether the user can permanently delete the model.
     */
    public function forceDelete(User $user, Attendee $attendee): bool
    {
        return false;
    }
}
