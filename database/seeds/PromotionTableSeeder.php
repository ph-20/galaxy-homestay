<?php

use Illuminate\Database\Seeder;

class PromotionTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('promotions')->insert([
            ['name'=>'khuuyến mãi cuối năm','room_type_id'=>'1','discount'=>'10','start_date'=>'2017/12/12','end_date'=>'2018/02/01'],
            ['name'=>'khuuyến mãi cuối năm','room_type_id'=>'3','discount'=>'13','start_date'=>'2017/12/12','end_date'=>'2018/02/03'],
            ['name'=>'khuuyến mãi cuối năm','room_type_id'=>'2','discount'=>'15','start_date'=>'2017/12/12','end_date'=>'2018/02/04']
        ]);
    }
}
