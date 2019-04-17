<?php

use Illuminate\Database\Seeder;

// @codingStandardsIgnoreLine
class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        DB::table('users')->insert([
            'username'  => 'Admin',
            'email'     => 'admin@travelnow.com',
            'role'      => 1,
            'password'  => bcrypt('Vin@!@#$%^'),
            'parent_id' => 0,
        ]);
        DB::table('setting_point')->insert([
            'introduce_friend' => 1000,
            'video_1'          => 20,
            'video_2'          => 30,
            'video_2'          => 50,
            'share_location'   => 10,
            'share_tour'       => 10,
            'rating_tour'      => 10,
            'rating_location'  => 10,
            'book_tour'        => 10,
            'point_default'    => 10,
        ]);

        DB::table('rank')->insert([
            [
                'rank_name_en' => 'phổ thông',
                'rank_name_vi' => 'phổ thông',
                'rank_name_th' => 'phổ thông',
                'point_level'  => 1000,
                'discount_max' => 0,
            ],
            [
                'rank_name_en' => 'bạc',
                'rank_name_vi' => 'bạc',
                'rank_name_th' => 'bạc',
                'point_level'  => 10000,
                'discount_max' => 2,
            ],
            [
                'rank_name_en' => 'vàng',
                'rank_name_vi' => 'vàng',
                'rank_name_th' => 'vàng',
                'point_level'  => 50000,
                'discount_max' => 3,
            ],
            [
                'rank_name_en' => 'bạch kim',
                'rank_name_vi' => 'bạch kim',
                'rank_name_th' => 'bạch kim',
                'point_level'  => 70000,
                'discount_max' => 5,
            ],
            [
                'rank_name_en' => 'kim cương',
                'rank_name_vi' => 'kim cương',
                'rank_name_th' => 'kim cương',
                'point_level'  => 100000,
                'discount_max' => 8,
            ],
            [
                'rank_name_en' => 'premium',
                'rank_name_vi' => 'Tren kim cương',
                'rank_name_th' => 'Tren kim cương',
                'point_level'  => 200000,
                'discount_max' => 11,
            ],
        ]);
    }
}
