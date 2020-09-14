<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateCustomersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('customers', function (Blueprint $table) {
            $table->id();
            $table->string('first_name');
            $table->string('last_name');

            $table->string('address')->nullable();
            $table->string('country')->nullable();
            $table->string('state')->nullable();
            $table->string('city')->nullable();
            $table->string('post_code')->nullable();

            $table->string('gender')->nullable();
            $table->date('date_of_birth')->nullable();
            $table->string('email');
            $table->boolean('is_email_verified')->default(false);
            $table->string('phone')->nullable();
            $table->boolean('is_phone_verified')->default(false);
            $table->string('nid_number')->nullable();
            $table->string('birth_certificate_number')->nullable();
            $table->string('passport_number')->nullable();
            $table->string('emergency_contact_number')->nullable();
            $table->string('username');
            $table->string('password');
            $table->boolean('is_active')->default(true);
            $table->text('ban_reason')->nullable();
            $table->string('avatar')->nullable();
            $table->string('password_reset_token')->nullable();

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
        Schema::dropIfExists('customers');
    }
}
