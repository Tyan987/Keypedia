<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class cartDetailsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $cartDet = [
            ['cart_id' => '1', 'keyboard_id' => '1', 'quantity' => '2'],
            ['cart_id' => '1', 'keyboard_id' => '2', 'quantity' => '4']
        ];

        DB::table('cart_details')->insert($cartDet);
    }
}
