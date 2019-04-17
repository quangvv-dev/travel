<?php

use Illuminate\Database\Seeder;

// @codingStandardsIgnoreLine
class UsersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('users')->insert([
            'name'      => 'Admin',
            'email'     => 'admin@travelnow.com',
            'role'      => 1,
            'password'  => bcrypt('Vin@!@#$%^'),
            'parent_id' => 0,
        ]);
    }
}
