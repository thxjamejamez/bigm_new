<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateLDistrictTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('l_district', function (Blueprint $table) {
            $table->Increments('id');
            $table->string('name', 50);
            $table->unsignedInteger('amphure_id');
            $table->foreign('amphure_id')->references('id')->on('l_amphure');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('l_district');
    }
}