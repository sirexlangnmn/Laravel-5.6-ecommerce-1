<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use App\User;

class DefaultUsersSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        User::create([
            'name' => 'John Lorenz Ruizo',
            'email' => 'imlorenzruizo@gmail.com',
            'password' => Hash::make('thequickbrownfox'),
            'admin' => 1
        ]);

        User::create([
            'name' => 'Federex Potolin',
            'email' => 'potolin.federex@gmail.com',
            'password' => Hash::make('federexpotolin'),
            'admin' => 1
        ]);

        User::create([
            'name' => 'Daphne Zaballero',
            'email' => 'zaballero.daphne@gmail.com',
            'password' => Hash::make('daphnezaballero'),
            'admin' => 1
        ]);
    }
}
