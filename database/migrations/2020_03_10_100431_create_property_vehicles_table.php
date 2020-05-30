<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePropertyVehiclesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('property_vehicles', function (Blueprint $table) {
            $table->id();
            $table->integer('vehicle_model_id');
            $table->integer('property_id');
            $table->integer('provider_id');

            $table->integer('total');
            $table->integer('available');
            $table->integer('booked')->default(0);

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
        Schema::dropIfExists('property_vehicles');
    }
}
