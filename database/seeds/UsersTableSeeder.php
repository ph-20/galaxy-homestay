<?php

use Illuminate\Database\Seeder;

class UsersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('users')->insert([
           ['email'=>'abc@gmail.com','name'=>'abc','password'=>bcrypt('123456'),'role'=>'1','active'=>'1'],
           ['email'=>'dung@gmail.com','name'=>'dung','password'=>bcrypt('123456'),'role'=>'2','active'=>'1'],
           ['email'=>'thai@gmail.com','name'=>'thai','password'=>bcrypt('123456'),'role'=>'3','active'=>'1'],
           ['email'=>'dung1@gmail.com','name'=>'dung1','password'=>bcrypt('123456'),'role'=>'2','active'=>'2'],
           ['email'=>'thai1@gmail.com','name'=>'thai1','password'=>bcrypt('123456'),'role'=>'3','active'=>'2'],
           ['email'=>'abc1@gmail.com','name'=>'abc1','password'=>bcrypt('123456'),'role'=>'3','active'=>'2']
        ]);
    }
}
