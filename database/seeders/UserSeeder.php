<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        User::create([
            'name' => 'Admin',
            'email' => 'admin@gmail.com',
            'password' => Hash::make('12345678'),
            'role' => 'admin',
        ]);

        User::create([
            'name' => 'Sauzan',
            'email' => 'sauzan@gmail.com',
            'email_verified_at' => now(),
            'password' => Hash::make('12345678'),
        ]);

        User::create([
            'name' => 'Hisam',
            'email' => 'hisam@gmail.com',
            'email_verified_at' => now(),
            'password' => Hash::make('12345678'),
        ]);
    }
}
