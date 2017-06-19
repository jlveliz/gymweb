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

        $user = new User();
        $data = [
            'username' => 'admin',
            'password' => $hash,
        ];
        $user->fill($data);
        // $user->password = $hash;
        $user->save();

    }
}
