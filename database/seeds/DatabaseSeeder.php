<?php

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
        $this->call(TitleTableSeeder::class);
        $this->call(ProvinceTableSeeder::class);
        $this->call(AmphureTableSeeder::class);
        $this->call(DistrictTableSeeder::class);
        $this->call(ProductCategoriesSeeder::class);
        $this->call(ProductsSeeder::class);
    }
}
