<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Str;

class UserTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //
        $users = [
            [
                'name' => 'John Doe',
                'email' => 'john@gmail.com',
                'remember_token' => Str::random(10),
                'password' => bcrypt('password'),
            ],
            [
                'name' => 'Desmond Ava',
                'email' => 'ava@gmail.com',
                'password' => bcrypt('password'),
                'remember_token' => Str::random(10),
            ],
            [
                'name' => 'Micheal Harry',
                'email' => 'admin@gmail.com',
                'isAdmin' => 1,
                'password' => bcrypt('password'),
                'remember_token' => Str::random(10),
            ]
        ];

        foreach ($users as $user) {
            \App\Models\User::updateOrCreate($user);
        }
    }
}
