<?php

namespace Database\Seeders;

use App\Models\User;
// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        User::factory()->create([
            'name' => 'Admin User',
            'email' => 'admin@admin.com',
        ]);

        User::factory()->create([
            'name' => 'Agent User',
            'email' => 'agent@agent.com',
        ]);

        $this->call([
            CategoriesSeeder::class,
            LabelsSeeder::class,
            RolesSeeder::class,
        ]);

        User::factory(10)
            ->create()
            ->each(fn ($user) => $user->assignRole('user'));
    }
}
