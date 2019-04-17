<?php

use Illuminate\Database\Seeder;

// @codingStandardsIgnoreLine
class SettingPointTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('setting_point')->insert([
            'introduce_friend' => 1000,
            'share_location'   => 10,
            'share_tour'       => 10,
            'rating_tour'      => 10,
            'rating_location'  => 10,
            'book_tour'        => 10,
            'point_default'    => 10,
        ]);
    }
}
