<?php

use Illuminate\Database\Seeder;
use GymWeb\Models\User;

class UsersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $hash = Hash::make("admin");

        $data = [
        	'username' => 'admin',
        	'password' => $hash,
        ];
        User::create($data);
    }
}
