<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $user = User::firstOrCreate(
            ['email' => 'carmeds@example.com'],
            [
                'name' => 'Santiago',
                'password' => Hash::make(config('auth.default_admin_password', '123456@Karmeds')),
            ]
        );

        $user->assignRole('admin');
    }
}
