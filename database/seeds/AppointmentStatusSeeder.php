<?php

use Illuminate\Database\Seeder;

class AppointmentStatusSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        \DB::table('l_appointment_status')->insertOrIgnore([
            ['id' => 1, 'name' => 'รอการตอบรับการนัดหมาย', 'active' => 1],
            ['id' => 2, 'name' => 'รอการตอบรับการเปลี่ยนแปลงวันนัดหมาย', 'active' => 1],
            ['id' => 3, 'name' => 'รอถึงกำหนดวันนัดหมาย', 'active' => 1],
            ['id' => 4, 'name' => 'เสร็จสิ้นการนัดหมาย', 'active' => 1],
            ['id' => 5, 'name' => 'การนัดหมายถูกยกเลิก', 'active' => 1]
        ]);
    }
}