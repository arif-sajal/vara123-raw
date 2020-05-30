<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePropertiesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('properties', function (Blueprint $table) {
            $table->id();

            // Detail
            $table->integer('property_type_id');
            $table->integer('provider_id');
            $table->integer('currency_id')->nullable();
            $table->string('name');
            $table->string('slug',220)->unique();
            $table->string('description');
            $table->string('featured_image')->nullable();
            $table->boolean('is_always_open')->default(false);

            // Location
            $table->string('lat');
            $table->string('lng');
            $table->point('point');
            $table->text('address');
            $table->integer('country_id');
            $table->integer('state_id');
            $table->integer('city_id');

            // Contact
            $table->string('phone');
            $table->string('email');

            $table->boolean('is_active')->default(True);
            $table->boolean('verified')->default(false);
            $table->boolean('status')->default(true);
            $table->integer('viewed')->default(0);
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
        Schema::dropIfExists('properties');
    }
}
