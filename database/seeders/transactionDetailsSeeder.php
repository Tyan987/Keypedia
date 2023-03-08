<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class transactionDetailsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $transactionDet = [
            ['transaction_id' => '1', 'keyboard_id' => '1', 'quantity' => '2'],
            ['transaction_id' => '2', 'keyboard_id' => '2', 'quantity' => '1']
        ];

        DB::table('transaction_details')->insert($transactionDet);
    }
}
