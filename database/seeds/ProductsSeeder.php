<?php

use Illuminate\Database\Seeder;

class ProductsSeeder extends Seeder
{
    public function run()
    {
        $data = $this->data();
        foreach ($data as $key => $value) {
            \DB::table('products')
            ->insertOrIgnore([
                'id' => $value['id'],
                'category_id' => $value['category_id'],
                'name' => $value['name'],
                'size' => $value['size'],
                'detail' => $value['detail'],
                'price' => $value['price'],
                'active' => $value['active'],
                'created_by' => $value['created_by']
            ]);
        }
    }

    private function data ()
    {
        return [
            ['id' => 1, 'category_id' => 1, 'name' => 'pd_test01', 'size' => '110*212', 'detail' => 'test detail..................', 'price' => 2500.30, 'active' => 1, 'created_by' => 1],
            ['id' => 2, 'category_id' => 1, 'name' => 'pd_test02', 'size' => '110*200', 'detail' => 'test detail..................', 'price' => 2300.20, 'active' => 1, 'created_by' => 1],
            ['id' => 3, 'category_id' => 2, 'name' => 'pd_test03', 'size' => '20*30', 'detail' => 'test detail..................', 'price' => 350.30, 'active' => 1, 'created_by' => 1],
            ['id' => 4, 'category_id' => 2, 'name' => 'pd_test04', 'size' => '80*90', 'detail' => 'test detail..................', 'price' => 450.30, 'active' => 1, 'created_by' => 1]
        ];
    }
}
