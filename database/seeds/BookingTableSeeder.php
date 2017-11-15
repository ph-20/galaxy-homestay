<?php

use Illuminate\Database\Seeder;

class BookingTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('bookings')->insert([
           ['customer_name'=>'dũng abc','customer_email'=>'ledungbsdfsd11@gmail.com','customer_phone'=>'016644153347',
               'customer_gender'=>'nam','customer_address'=>' sfdsf đà nẵng','total'=>'1500000','from_date'=>'2017/11/15',
               'to_date'=>'2017/11/20','protect_code'=>'372947','status'=>'1'
           ],
           ['customer_name'=>'dũngádasd','customer_email'=>'ledsadsaungb11@gmail.com','customer_phone'=>'016641534553347',
               'customer_gender'=>'nam','customer_address'=>'đà nẵngsadasd','total'=>'1900000','from_date'=>'2017/11/14',
               'to_date'=>'2017/11/20','protect_code'=>'372942','status'=>'1'
           ],
           ['customer_name'=>'dũng','customer_email'=>'ledungdfsdfsdb11@gmail.com','customer_phone'=>'0166413453453347',
               'customer_gender'=>'nam','customer_address'=>'đà nẵngfsdfds','total'=>'2500000','from_date'=>'2017/11/15',
               'to_date'=>'2017/11/20','protect_code'=>'372943','status'=>'1'
           ]
        ]);
       
    }
}
