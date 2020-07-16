<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateDaysTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('days', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->string('short_name');
            $table->timestamps();
        });

        $days = [
            ['name'=>'Saturday','short_name'=>'SA'],
            ['name'=>'Sunday','short_name'=>'SU'],
            ['name'=>'Monday','short_name'=>'MO'],
            ['name'=>'Tuesday','short_name'=>'TU'],
            ['name'=>'Wednesday','short_name'=>'WE'],
            ['name'=>'Thursday','short_name'=>'TH'],
            ['name'=>'Friday','short_name'=>'FR'],
        ];

        \App\Models\Day::insert($days);
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('days');
    }
}
