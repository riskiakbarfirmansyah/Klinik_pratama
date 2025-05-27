<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;
use App\Models\User;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        // Membuat akun Super Admin
        User::create([
            'name' => 'Super Admin',
            'email' => 'superadmin@example.com',
            'password' => Hash::make('password123'),
            'role' => 'superadmin',
            'is_superadmin' => 1,
            'is_admin' => 1,
        ]);

        // Membuat akun Admin
        User::create([
            'name' => 'Admin',
            'email' => 'admin@example.com',
            'password' => Hash::make('password123'),
            'role' => 'admin',
            'is_superadmin' => 0,
            'is_admin' => 1,
        ]);

        // Membuat akun User
        User::create([
            'name' => 'User',
            'email' => 'user@example.com',
            'password' => Hash::make('password123'),
        ]);

        // Membuat akun User
        User::create([
            'name' => 'User2',
            'email' => 'user2@example.com',
            'password' => Hash::make('password123'),
        ]);
    }
}
