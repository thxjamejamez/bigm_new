<?php

use Illuminate\Database\Seeder;

class QuotationStatusSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        \DB::table('l_quotation_status')->insertOrIgnore([
            ['id' => 1, 'name' => 'รอการตอบรับ', 'active' => 1],
            ['id' => 2, 'name' => 'รอการตอบรับการนัดหมาย', 'active' => 1],
            ['id' => 3, 'name' => 'รอการตอบรับการเปลี่ยนวันที่การนัดหมาย', 'active' => 1],
            ['id' => 4, 'name' => 'รอการตรวจวัด', 'active' => 1],
            ['id' => 5, 'name' => 'รออนุมัติ', 'active' => 1],
            ['id' => 6, 'name' => 'อนุมัติ', 'active' => 1],
            ['id' => 7, 'name' => 'ไม่อนุมัติ', 'active' => 1]
        ]);
    }
}
