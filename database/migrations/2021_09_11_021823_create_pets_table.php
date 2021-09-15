<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePetsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('pets', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string("name");
            $table->integer("age");
            $table->unsignedBigInteger("species_id");
            $table->string("breed");
            $table->unsignedBigInteger("owner_id");
            $table->softDeletes();

            $table->foreign('owner_id')->references('id')->on('owners');
            $table->foreign('species_id')->references('id')->on('species');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('pets');
    }
}
