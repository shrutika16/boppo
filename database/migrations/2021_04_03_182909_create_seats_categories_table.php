<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateSeatsCategoriesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('seats_categories', function (Blueprint $table) {
            $table->id();
            $table->string('name', 200);
            $table->integer('reserved_percentage')->default(0);
            $table->integer('category_rank')->default(0);
            $table->integer('master_category')->default(0);
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
        Schema::dropIfExists('seats_categories');
    }
}
