<?php

namespace App\Models;

use Coderflex\LaravelTicket\Models\Category as TicketCategory;
use Illuminate\Support\Str;

class Category extends TicketCategory
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
        static::saving(function (Category $category) {
            $category->slug = Str::slug($category->name);
        });
    }
}
