<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class keyboardsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $keyboard = [
            ['name' => 'GamaKay K87', 'price' => '80', 'description' => 'Brand: GamaKay Name: RGB mechanical keyboard Model: K87 Key: 87 keysBacklight: RGB backlightInterface: Type-C 3.1Weight: 810gPackage includes:1 * K87 RGB mechanical keyboard1 * Type-C Cable1 * User', 'image' => 'images/keyboards/GamaKay87.jpg', 'category_id' => '1'],
            ['name' => 'Royal Kludge G87', 'price' => '63', 'description' => 'Brand: RK Model: G-87 Keyboard number: 87 Keys Body: RK Black Connection way: USB Wired / Wireless bluetooth 3.0 Keycap: ABS two-color injection keycaps', 'image' => 'images/keyboards/RoyalKludge.jpg', 'category_id' => '1'],
            ['name' => 'Ganss GK-87 Pro', 'price' => '42', 'description' => 'Aircraft-grade anodized brushed aluminum frame for superior durability / Advanced lighting control deliver dynamic', 'image' => 'images/keyboards/GK-87.jpg', 'category_id' => '1'],
            
            ['name' => 'Redragon K617', 'price' => '74', 'description' => 'Dedicated for FPS Gamer: Place the keyboard proper straight on your desktop and no more crooked way for mouse space saving, your mouse will never hit the keyboard any more. Enjoy waving the mouse without any worries and go get that Team Kills.', 'image' => 'images/keyboards/RedragonK617.jpg', 'category_id' => '2'],
            ['name' => '61 Dash Keyboard', 'price' => '67', 'description' => 'Best 61 Key Keyboard Under $70', 'image' => 'images/keyboards/61Key.jpg', 'category_id' => '2'],
            ['name' => 'Customized SK61', 'price' => '49', 'description' => 'Specification: Brand Geek Customized Model SK61 Keys Amount 61 Keys Color White, Pink Switch Gateron Switch (Blue Switch, Brown Switch, Red Switch)', 'image' => 'images/keyboards/CustomizedSK61.jpg', 'category_id' => '2'],

            ['name' => 'STS KBDfans', 'price' => '89', 'description' => 'Features: GreyWhiteColor keycapsPBT materialXDA profileSublimation fonts75 keys Specifications: Brand: KBDfansInterface type: Black (PS/2); White (USB)Number of keys: 75 keysErgonomics: support', 'image' => 'images/keyboards/STSKBDFans.jpg', 'category_id' => '3'],
            ['name' => 'XDA Dash Keyboard', 'price' => '71', 'description' => 'Best 61 Key Keyboard Under $80', 'image' => 'images/keyboards/XDAKey.jpg', 'category_id' => '3'],

            ['name' => 'Cherry Dash Keyboard', 'price' => '76', 'description' => 'Best 61 Key Keyboard Under $80', 'image' => 'images/keyboards/cherryProfile.jpg', 'category_id' => '4'],
            ['name' => 'Keycaps set 141 PBT', 'price' => '65', 'description' => 'Theme: Milk Keycaps Material: PBT Profile: Cherry Profile Number of Keys: 141 Keys', 'image' => 'images/keyboards/141PBT.jpg', 'category_id' => '4'],
        ];

        DB::table('keyboards')->insert($keyboard);
    }
}
