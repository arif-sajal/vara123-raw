<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePropertySpotsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('property_spots', function (Blueprint $table) {
            $table->id();
            $table->integer('property_id');
            $table->integer('provider_id');

            $table->integer('total');
            $table->integer('available');
            $table->integer('booked');

            $table->string('name');
            $table->text('description')->nullable();
            $table->string('featured_image')->nullable();
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
        Schema::dropIfExists('property_spots');
    }
}
