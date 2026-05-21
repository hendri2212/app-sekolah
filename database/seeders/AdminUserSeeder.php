<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

class AdminUserSeeder extends Seeder
{
    public function run(): void
    {
        // Superadmin
        DB::table('users')->updateOrInsert(
            ['email' => 'superadmin@gmail.com'],
            [
                'name'       => 'Super Administrator',
                'email'      => 'superadmin@gmail.com',
                'password'   => Hash::make('superadmin123'),
                'role'       => 'superadmin',
                'created_at' => now(),
                'updated_at' => now(),
            ]
        );

        // Admin
        DB::table('users')->updateOrInsert(
            ['email' => 'admin@gmail.com'],
            [
                'name'       => 'Administrator',
                'email'      => 'admin@gmail.com',
                'password'   => Hash::make('admin123'),
                'role'       => 'admin',
                'created_at' => now(),
                'updated_at' => now(),
            ]
        );

        // Operator
        DB::table('users')->updateOrInsert(
            ['email' => 'operator@gmail.com'],
            [
                'name'       => 'Operator',
                'email'      => 'operator@gmail.com',
                'password'   => Hash::make('operator123'),
                'role'       => 'operator',
                'created_at' => now(),
                'updated_at' => now(),
            ]
        );
    }
}
