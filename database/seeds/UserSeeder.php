<?php

use Illuminate\Database\Seeder;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        \DB::table('users')->insertOrIgnore([
            [
                'id' => 1,
                'name' => 'admin',
                'email' => 'admin@admin.com',
                'password' => Hash::make('Aa123456'),
                'type' => 1,
                'active' => 1
            ], [
                'id' => 2,
                'name' => 'cust01',
                'email' => 'cust01@test.com',
                'password' => Hash::make('Aa123456'),
                'type' => 2,
                'active' => 1
            ]
        ]);
    }
}