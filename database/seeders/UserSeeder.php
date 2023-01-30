<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $users = [
            [
                'username' => 'admin',
                'email' => 'admin@gmail.com',
                'password' => Hash::make('admin123'),
                'gender' => 'male',
                'type' => 1,
            ],
            [
                'username' => 'user',
                'email' => 'user@gmail.com',
                'password' => Hash::make('user123'),
                'gender' => 'male',
                'type' => 0,
            ],
        ];
    
        foreach ($users as $key => $user) {
            User::create($user);
        }
    }
}
