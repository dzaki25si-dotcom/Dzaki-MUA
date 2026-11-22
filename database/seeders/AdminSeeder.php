<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class AdminSeeder extends Seeder
{
    public function run(): void
    {
        User::updateOrCreate(
            ['email' => 'admin@muaulva.com'],
            [
                'name' => 'Admin MUA Ulva',
                'password' => Hash::make('admin123'),
                'role' => 'Admin',
            ]
        );
    }
}
