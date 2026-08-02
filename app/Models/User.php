<?php

namespace App\Models;

use Coderflex\LaravelTicket\Concerns\HasTickets;
use Coderflex\LaravelTicket\Contracts\CanUseTickets;
// use Illuminate\Contracts\Auth\MustVerifyEmail;
use Database\Factories\UserFactory;
use Illuminate\Database\Eloquent\Attributes\Fillable;
use Illuminate\Database\Eloquent\Attributes\Hidden;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Spatie\Permission\Traits\HasRoles;

#[Fillable(['name', 'email', 'password'])]
#[Hidden(['password', 'remember_token'])]
class User extends Authenticatable implements CanUseTickets
{
    /** @use HasFactory<UserFactory> */
    use HasFactory, HasRoles, HasTickets, Notifiable;

    /**
     * Get the attributes that should be cast.
     *
     * @return array<string, string>
     */
    protected function casts(): array
    {
        return [
            'email_verified_at' => 'datetime',
            'password' => 'hashed',
        ];
    }

    /**
     * Get the tickets for the user.
     */
    public function tickets(): HasMany
    {
        return $this->hasMany(Ticket::class, 'user_id');
    }
}
