<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        $this->call([
            categoriesTableSeeder::class,
            keyboardsTableSeeder::class,
            usersSeeder::class,
            cartsSeeder::class,
            cartDetailsSeeder::class,
            transactionsSeeder::class,
            transactionDetailsSeeder::class
        ]);
    }
}
