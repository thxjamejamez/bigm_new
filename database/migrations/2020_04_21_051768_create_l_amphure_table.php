<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateLAmphureTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('l_amphure', function (Blueprint $table) {
            $table->Increments('id');
            $table->string('name', 50);
            $table->unsignedInteger('province_id');
            $table->foreign('province_id')->references('id')->on('l_province');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('l_amphure');
    }
}