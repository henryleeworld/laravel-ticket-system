<?php

namespace App\Models;

use Coderflex\LaravelTicket\Models\Category as TicketCategory;
use Illuminate\Support\Str;

class Category extends TicketCategory
{
    protected $casts = [
        'is_visible' => 'boolean',
    ];

    public static function boot()
    {
        parent::boot();

        static::saving(function (Category $category) {
            $category->slug = Str::slug($category->name);
        });
    }
}