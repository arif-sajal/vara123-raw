<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateTimingsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('timings', function (Blueprint $table) {
            $table->id();
            $table->integer('property_id');

            $table->string('day_name');
            $table->string('day_number');
            $table->time('opening')->nullable();
            $table->time('closing')->nullable();
            $table->boolean('is_off_day')->default(false);
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
        Schema::dropIfExists('timings');
    }
}
