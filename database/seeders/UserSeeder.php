<?php

namespace Database\Seeders;

use App\Enums\UserRoles;
use App\Models\User;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run(): void
    {
        User::factory()->create([
            'email' => 'admin@gmail.com',
            'password' => Hash::make('admin')
        ])->assignRole(UserRoles::admin->name);
        User::factory()->create([
            'email' => 'manager@gmail.com',
            'password' => Hash::make('manager')
        ])->assignRole(UserRoles::manager->name);
        User::factory()->create([
            'email' => 'user@gmail.com',
            'password' => Hash::make('user')
        ])->assignRole(UserRoles::user->name);
    }
}
