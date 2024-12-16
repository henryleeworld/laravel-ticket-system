<?php

namespace App\Models;

use Coderflex\LaravelTicket\Models\Label as TicketLabel;
use Illuminate\Support\Str;

class Label extends TicketLabel
{
    /**
     * Get the attributes that should be cast.
     *
     * @return array<string, string>
     */
    protected function casts(): array
    {
        return [
            'is_visible' => 'boolean',
        ];
    }

    /**
     * The "booted" method of the model.
     */
    protected static function booted(): void
    {
        static::saving(function (Label $category) {
            $category->slug = Str::slug($category->name);
        });
    }
}
