<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateBillingsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::defaultStringLength(256);
        Schema::create('billings', function (Blueprint $table) {
            $table->id();
            $table->integer('property_id');
            $table->integer('item_id');
            $table->string('item_type');
            $table->integer('billing_type_id');

            $table->float('amount');
            $table->integer('currency_id');
            $table->boolean('active')->default(false);
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
        Schema::dropIfExists('billings');
    }
}
