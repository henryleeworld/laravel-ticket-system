<?php

namespace App\Models;

use Coderflex\LaravelTicket\Models\Label as TicketLabel;
use Illuminate\Support\Str;

class Label extends TicketLabel
{
    protected $casts = [
        'is_visible' => 'boolean',
    ];

    public static function boot()
    {
        parent::boot();

        static::saving(function (Label $category) {
            $category->slug = Str::slug($category->name);
        });
    }
}