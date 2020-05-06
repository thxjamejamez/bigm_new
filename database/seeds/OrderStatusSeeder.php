<?php

use Illuminate\Database\Seeder;

class OrderStatusSeeder extends Seeder
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
            \DB::table('l_order_status')
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
            ['id' => 1, 'name' => 'รอการตอบรับ'],
            ['id' => 2, 'name' => 'รอการตอบรับการเปลี่ยนวันที่'],
            ['id' => 3, 'name' => 'รอการชำระเงิน'],
            ['id' => 4, 'name' => 'รอการตรวจสอบการชำระเงิน'],
            ['id' => 5, 'name' => 'สินค้าอยู่ในระหว่างการจัดทำ'],
            ['id' => 6, 'name' => 'สินค้าอยู่ระหว่างการรอติดตั้ง'],
            ['id' => 7, 'name' => 'คำสั่งซื้อสำเร็จ'],
            ['id' => 8, 'name' => 'คำสั่งซื้อไม่สำเร็จ']
        ];
    }
}