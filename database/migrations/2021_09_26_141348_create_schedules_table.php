<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateSchedulesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('schedules', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('employee_id');
            $table->unsignedBigInteger('service_id');
            $table->unsignedBigInteger('pet_id');
            $table->dateTime('start_time');
            $table->dateTime('end_time');
            $table->decimal('price', 15, 2);
            $table->timestamps();

            $table->foreign('employee_id')->references('id')->on('employees');
            $table->foreign('service_id')->references('id')->on('services');
            $table->foreign('pet_id')->references('id')->on('pets');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('schedules');
    }
}
