<?php

use Illuminate\Database\Seeder;

class ImageTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('images')->insert([
            ['image'=>'abc.jpg','status'=>'1'],
            ['image'=>'abc.jpg','status'=>'2'],
            ['image'=>'abc.jpg','status'=>'3']
        ]);
    }
}
