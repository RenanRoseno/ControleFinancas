<?php

use Illuminate\Database\Seeder;
use App\User;

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
            'name' => 'admin',
            'email' => 'admin123@gmail.com',
            'password' => bcrypt('123')
        ]);

        User::create([
            'name' => 'other',
            'email' => 'other123@gmail.com',
            'password' => bcrypt('123')
        ]);
    }
}
