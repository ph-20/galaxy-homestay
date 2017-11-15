<?php

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        // $this->call(UsersTableSeeder::class);
        $this->call(RoomTypeTableSeeder::class);
        $this->call(RoomTableSeeder::class);
        $this->call(BookingTableSeeder::class);
        $this->call(PromotionTableSeeder::class);
        $this->call(BookingRoomTableSeeder::class);
        $this->call(ServiceTableSeeder::class);
        $this->call(BookingRoomServiceTableSeeder::class);
        $this->call(UsersTableSeeder::class);
        $this->call(ImageTableSeeder::class);
        $this->call(CommentTableSeeder::class);
    }
}
