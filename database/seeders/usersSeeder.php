<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

class usersSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $user = [
            ['username' => 'Tyan', 'email' => 'tyan@gmail.com', 'password' => Hash::make('tyan1234567'), 'address' => 'Jl. Kemang IV No.1', 'gender' => 'Male', 'date_of_birth' => '2001-10-10', 'role' => 'user'],
            ['username' => 'Helmi', 'email' => 'helmi@gmail.com', 'password' => Hash::make('helmi1234567'), 'address' => 'Jl. Kemang V No.1', 'gender' => 'Male', 'date_of_birth' => '2001-09-10', 'role' => 'user'],
            ['username' => 'Mike', 'email' => 'mike@gmail.com', 'password' => Hash::make('mike1234567'), 'address' => 'Jl. Kemang V No.1', 'gender' => 'Male', 'date_of_birth' => '2001-07-10', 'role' => 'manager']
        ];

        DB::table('users')->insert($user);
    }
}
