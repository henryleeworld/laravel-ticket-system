<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Role;

class RolesSeeder extends Seeder
{
    /**
     * Run the database seeders.
     */
    public function run(): void
    {
        Role::create(['name' => 'admin']);
        Role::create(['name' => 'agent']);
        Role::create(['name' => 'user']);

        User::find(1)->assignRole('admin');
        User::find(2)->assignRole('agent');
    }
}
