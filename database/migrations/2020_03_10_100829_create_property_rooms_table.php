<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePropertyRoomsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('property_rooms', function (Blueprint $table) {
            $table->id();
            $table->integer('property_id');
            $table->integer('provider_id');

            $table->integer('total');
            $table->integer('available');
            $table->integer('booked');

            $table->string('name');
            $table->text('description')->nullable();
            $table->integer('for_person');
            $table->integer('bed_count');
            $table->string('featured_image')->nullable();
            $table->enum('room_type',['single','double','queen','king']);
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
        Schema::dropIfExists('property_rooms');
    }
}
