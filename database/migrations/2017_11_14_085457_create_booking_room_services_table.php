<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateBookingRoomServicesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('booking_room_services', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('book_room_id')->unsigned();
            $table->integer('service_id')->unsigned();
            $table->integer('qty');
            $table->foreign('book_room_id')
                ->references('id')
                ->on('booking_rooms')
                ->onDelete('cascade')
                ->onUpdate('cascade');
            $table->foreign('service_id')
                ->references('id')
                ->on('services')
                ->onDelete('cascade')
                ->onUpdate('cascade');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('booking_room_services');
    }
}
