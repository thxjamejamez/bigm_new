<?php

use Illuminate\Database\Seeder;

class TitleTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        \DB::table('l_title')->insertOrIgnore([
            ['id' => 1, 'name' => 'นาย'],
            ['id' => 2, 'name' => 'นาง'],
            ['id' => 3, 'name' => 'นางสาว']
        ]);
    }
}