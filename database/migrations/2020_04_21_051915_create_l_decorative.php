<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateLDecorative extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('l_decorative', function (Blueprint $table) {
            $table->Increments('id');
            $table->string('name', 50);
            $table->double('price_per_unit', 8, 2);
            $table->string('img_file', 50);
            $table->boolean('active');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('l_decorative');
    }
}