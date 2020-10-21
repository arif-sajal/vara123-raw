<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateBookingsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('bookings', function (Blueprint $table) {
            $table->id();
            $table->integer('customer_id');
            $table->integer('provider_id');
            $table->integer('property_id');
            $table->integer('item_id');
            $table->string('item_type');
            $table->integer('billing_id');
            $table->date('from_date');
            $table->date('to_date');
            $table->time('from_time')->nullable();
            $table->time('to_time')->nullable();
            $table->integer('quantity');
            $table->integer('admin_cut');
            $table->integer('provider_cut');

            $table->decimal('cost_per_unit','8','2');
            $table->decimal('cost_total','8','2');

            $table->integer('currency_id');
            $table->integer('payment_type')->default(0);
            $table->boolean('is_payment_done');
            $table->text('note')->nullable();
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
        Schema::dropIfExists('bookings');
    }
}
