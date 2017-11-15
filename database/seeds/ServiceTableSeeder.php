<?php

use Illuminate\Database\Seeder;

class ServiceTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('services')->insert([
            ['name'=>'tập gym', 'price'=>'130000','description'=>'mở cửa từ 5:00Am đến 11:00Pm','status'=>'1'],
            ['name'=>'bể bơi', 'price'=>'150000','description'=>'mở cửa từ 5:00Am đến 8:00Pm','status'=>'2']
        ]);
    }
}
