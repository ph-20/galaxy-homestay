<?php

use Illuminate\Database\Seeder;

class BookingRoomTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('booking_rooms')->insert([
            ['booking_id'=>'1','room_id'=>'1'],
            ['booking_id'=>'2','room_id'=>'2'],
            ['booking_id'=>'3','room_id'=>'3']
        ]);
    }
}
