<?php

use Illuminate\Database\Seeder;

class CommentTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('comments')->insert([
            ['name'=>'abc', 'email'=>'abc@gmail.com','content'=>'chất lượng phục vụ tốt'],
            ['name'=>'def', 'email'=>'def@gmail.com','content'=>'chất lượng phục vụ tốt ổn nhưng dịch vụ lại khá tốt']
        ]);
    }
}
