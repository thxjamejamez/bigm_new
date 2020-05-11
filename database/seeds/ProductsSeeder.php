<?php

use Illuminate\Database\Seeder;

class ProductsSeeder extends Seeder
{
    public function run()
    {
        $data = $this->data();
        foreach ($data as $key => $value) {
            \DB::table('product_formats')
                ->insertOrIgnore([
                    'id' => $value['id'],
                    'name' => $value['name'],
                    'img_path' => $value['img_path'],
                    'category_id' => $value['category_id'],
                    'created_by' => $value['created_by'],
                    'active' => $value['active']
                ]);
        }
    }

    private function data()
    {
        return [
            [
                'id' => 1,
                'name' => 'pd_test01',
                'img_path' => '',
                'category_id' => 1,
                'created_by' => 1,
                'active' => 1
            ],
            [
                'id' => 2,
                'name' => 'pd_test02',
                'img_path' => '',
                'category_id' => 1,
                'created_by' => 1,
                'active' => 1
            ],
            [
                'id' => 3,
                'name' => 'pd_test03',
                'img_path' => '',
                'category_id' => 2,
                'created_by' => 2,
                'active' => 1
            ],
            [
                'id' => 4,
                'name' => 'pd_test04',
                'img_path' => '',
                'category_id' => 2,
                'created_by' => 2,
                'active' => 1
            ],
            [
                'id' => 5,
                'name' => 'pd_test05',
                'img_path' => '',
                'category_id' => 2,
                'created_by' => 2,
                'active' => 1
            ],
        ];
    }
}