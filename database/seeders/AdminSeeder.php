<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class AdminSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $user =  User::create([
            'name' => 'Belal Hamdan',
            'email' => 'belal@lead2performance.com',
            'password' => Hash::make('password')
        ]);
        $user->assignRole('Super Admin');

        $user = User::create([
            'name' => 'Majd Yahia',
            'email' => 'majd.m4a4@gamil.com',
            'password' => Hash::make('password')
        ]);
        $user->assignRole('Super Admin');
    }
}
