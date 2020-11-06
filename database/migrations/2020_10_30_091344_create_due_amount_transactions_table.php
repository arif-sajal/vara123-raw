<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateDueAmountTransactionsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('due_amount_transactions', function (Blueprint $table) {
            $table->id();
            $table->unsignedInteger('amount');
            $table->foreignId('provider_id');
            $table->enum('status',['SUCCESS','FAILED','CANCELED','PENDING'])->default('PENDING');
            $table->json('payment_initiation_server_response')->nullable();
            $table->json('payment_validation_server_response')->nullable();
            $table->enum('paid_by',['Cash','Online Payment'])->nullable();
            $table->boolean('is_payment_done')->default(false);
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
        Schema::dropIfExists('due_amount_transactions');
    }
}
