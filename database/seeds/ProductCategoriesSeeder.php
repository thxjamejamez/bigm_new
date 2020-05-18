<?php

use Illuminate\Database\Seeder;

class ProductCategoriesSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $data = $this->data();
        foreach ($data as $key => $value) {
            \DB::table('product_categories')
                ->insertOrIgnore([
                    'id' => $value['id'],
                    'name' => $value['name'],
                    'active' => 1
                ]);
        }
    }

    private function data()
    {
        return [
            ['id' => 1, 'name' => 'รูปแบบสินค้าทั่วไป'],
            ['id' => 2, 'name' => 'รูปแบบสินค้าที่อัพโหลด']
        ];
    }
}
