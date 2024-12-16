<?php

namespace Database\Seeders;

use App\Models\Label;
use Illuminate\Database\Seeder;

class LabelsSeeder extends Seeder
{
    /**
     * Run the database seeders.
     */
    public function run(): void
    {
        $labels = [
            "bug", "question", "enhancement",
        ];

        foreach ($labels as $label) {
            Label::create([
                'name' => $label,
            ]);
        }
    }
}
