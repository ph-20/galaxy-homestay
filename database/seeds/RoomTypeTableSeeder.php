<?php

use Illuminate\Database\Seeder;


class RoomTypeTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('room_types')->insert([
            ['name'=>'1 Phòng Ngủ','price'=>'1300000','description'=>'chưa cập nhật','detail'=>'chưa cập nhật','thumbnail'=>'abc.jpg'],
            ['name'=>'2 Phòng Ngủ','price'=>'2000000','description'=>'chưa cập nhật','detail'=>'chưa cập nhật','thumbnail'=>'abc.jpg'],
            ['name'=>'3 Phòng Ngủ','price'=>'2600000','description'=>'chưa cập nhật','detail'=>'chưa cập nhật','thumbnail'=>'abc.jpg']
        ]);
    }
}
