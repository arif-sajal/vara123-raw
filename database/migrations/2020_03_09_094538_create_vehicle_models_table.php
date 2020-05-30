<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateVehicleModelsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('vehicle_models', function (Blueprint $table) {
            $table->id();
            $table->integer('manufacturer_id');
            $table->integer('vehicle_type_id');

            $table->string('model_name');
            $table->integer('model_year');
            $table->float('height');
            $table->float('width');
            $table->float('length');

            $table->float('mileage');
            $table->string('transmission');
            $table->string('fuel_type');
            $table->integer('door_count');
            $table->string('image');
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
        Schema::dropIfExists('vehicle_models');
    }
}
