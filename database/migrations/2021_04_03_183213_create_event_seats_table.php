<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateEventSeatsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('event_seats', function (Blueprint $table) {
            $table->id();
            $table->integer('event_id');
            $table->integer('seat_category_id');
            $table->integer('seat_no_from');
            $table->integer('seat_no_to');
            $table->integer('seat_price');
            $table->integer('total_price');
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
        Schema::dropIfExists('event_seats');
    }
}
