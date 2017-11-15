<?php

use Illuminate\Database\Seeder;

class RoomTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('rooms')->insert([
            ['room_code'=>'101','room_type_id'=>'1','description'=>'phòng nằm ở tầng 1','thumbnail'=>'abc.jpg','status'=>'1'],
            ['room_code'=>'201','room_type_id'=>'2','description'=>'phòng nằm ở tầng 2','thumbnail'=>'abc.jpg','status'=>'1'],
            ['room_code'=>'301','room_type_id'=>'3','description'=>'phòng nằm ở tầng 3','thumbnail'=>'abc.jpg','status'=>'2']
        ]);
    }
}
