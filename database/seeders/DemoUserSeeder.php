<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;
use App\Models\User;

class DemoUserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        User::updateOrCreate(
            ['email' => 'test@example.com'],
            [
                'name' => 'Test User',
                'password' => Hash::make('password'),
                'is_admin' => false,
                'email_verified_at' => null,
            ]
        );
        User::updateOrCreate(
            ['email' => 'demo@huit.edu.vn'],
            [
                'name' => 'Demo User',
                'password' => Hash::make('password123'),
                'is_admin' => true,
            ]
        );
    }
}
