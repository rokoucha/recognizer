<?php

use App\User;
use Illuminate\Database\Seeder;

class UsersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        User::create([
            'name' => 'rokoucha',
            'email' => 'dev@rokoucha.net',
            'password' => Hash::make('hogepiyo'),
            'remember_token' => 'piyohoge',
        ]);
    }
}
