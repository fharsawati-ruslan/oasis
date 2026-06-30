<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class UserSeeder extends Seeder
{
    public function run(): void
    {
        $user = User::updateOrCreate(

            [
                'email' => 'admin@admin'
            ],

            [
                'name' => 'Administrator',
                'password' => Hash::make('admin@1234'),
            ]

        );

        $user->assignRole('super-admin');
    }
}