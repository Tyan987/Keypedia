<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class TransactionsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $transaction = [
            ['user_id' => '1', 'date' => '2021-10-10 12:41:00'],
            ['user_id' => '1', 'date' => '2021-10-15 13:51:00']
        ];

        DB::table('transactions')->insert($transaction);
    }
}
