<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\User;
use Illuminate\Support\Facades\Hash;

class UserSeeder extends Seeder
{
    public function run()
    {
        User::firstOrCreate([
            'email' => 'groversary@gmail.com',
        ], [
            'name' => 'candra',
            'password' => bcrypt('12345678'),
            'email_verified_at' => now(),
        ]);
    }
}