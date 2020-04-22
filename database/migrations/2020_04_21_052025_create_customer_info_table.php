<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateCustomerInfoTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('customer_info', function (Blueprint $table) {
            $table->Increments('id');
            $table->unsignedBigInteger('user_id');
            $table->unsignedInteger('title_id');
            $table->string('first_name', 50);
            $table->string('last_name', 50);
            $table->date('birthdate');
            $table->string('address', 100);
            $table->unsignedInteger('district_id');
            $table->string('tel', 20);
            $table->foreign('user_id')->references('id')->on('users');
            $table->foreign('title_id')->references('id')->on('l_title');
            $table->foreign('district_id')->references('id')->on('l_district');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('customer_info');
    }
}