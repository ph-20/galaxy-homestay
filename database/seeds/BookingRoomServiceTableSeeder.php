<?php

use Illuminate\Database\Seeder;

class BookingRoomServiceTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('booking_room_services')->insert([
            ['book_room_id'=>'1','service_id'=>'1','qty'=>'1'],
            ['book_room_id'=>'1','service_id'=>'2','qty'=>'2']
        ]);
    }
}
