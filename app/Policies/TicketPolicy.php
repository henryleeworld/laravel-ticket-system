<?php

namespace App\Policies;

use App\Models\Ticket;
use App\Models\User;
use Illuminate\Auth\Access\HandlesAuthorization;

class TicketPolicy
{
    use HandlesAuthorization;

    /**
     * Determine whether the user can view the model.
     */
    public function view(User $user, Ticket $ticket): bool
    {
        if ($user->hasRole('admin')) {
            return true;
        }

        if ($user->hasRole('agent') && $ticket->assigned_to === $user->id) {
            return true;
        }

        if ($ticket->user_id === $user->id) {
            return true;
        }

        return false;
    }

    /**
     * Determine whether the user can update the model.
     */
    public function update(User $user, Ticket $ticket): bool
    {
        if ($user->hasRole('admin')) {
            return true;
        }

        if ($user->hasRole('agent') && $ticket->assigned_to === $user->id) {
            return true;
        }

        return false;
    }

    /**
     * Determine whether the user can delete the model.
     */
    public function delete(User $user, Ticket $ticket): bool
    {
        return $user->hasRole('admin');
    }
}