<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class categoriesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $category = [
            ['name' => '87 Key Keyboard', 'image' => 'images/categories/87Key.jpg'],
            ['name' => '61 Key Keyboard', 'image' => 'images/categories/61Key.jpg'],
            ['name' => 'XDA Profile', 'image' => 'images/categories/XDAKey.jpg'],
            ['name' => 'Cherry Profile', 'image' => 'images/categories/cherryProfile.jpg']
        ];

        DB::table('categories')->insert($category);
    }
}
