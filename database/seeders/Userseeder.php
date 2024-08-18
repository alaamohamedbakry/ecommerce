<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class Userseeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        User::create([
            'name' => 'alaa',
            'email' => 'alaa@mail.com',
            'email_verified_at' => now(),
            'password' => Hash::make('12345678'),
            'role' => 'admin'
        ]);
    }
}
