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
        User::create([
            'name' => 'Belal Hamdan',
            'email' => 'belal@lead2performance.com',
            'password' => Hash::make('password')
        ]);

        User::create([
            'name'=>'Majd Yahia',
            'email'=>'majd@lead2performance.com',
            'password'=>Hash::make('password')
        ]);
    }
}
