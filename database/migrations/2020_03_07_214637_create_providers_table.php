<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateProvidersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('providers', function (Blueprint $table) {
            $table->id();
            $table->string('first_name');
            $table->string('last_name');
            $table->enum('user_type',['Organization','Individual'])->default('Individual');
            $table->string('gender')->nullable();
            $table->string('address')->nullable();
            $table->date('date_of_birth')->nullable();
            $table->string('email');
            $table->boolean('is_email_verified')->default(false);
            $table->string('phone')->nullable();
            $table->unsignedInteger('balance')->default(0);
            $table->boolean('is_phone_verified')->default(false);
            $table->string('username');
            $table->string('password');
            $table->boolean('is_active')->default(true);
            $table->boolean('is_registration_verified')->default(false);
            $table->text('ban_reason')->nullable();
            $table->string('avatar')->nullable();
            $table->integer('currency_id')->default(1);
            $table->string('remember_token')->nullable();
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
        Schema::dropIfExists('providers');
    }
}
