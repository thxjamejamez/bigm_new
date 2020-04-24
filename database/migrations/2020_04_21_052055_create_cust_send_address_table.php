<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateCustSendAddressTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('cust_send_address', function (Blueprint $table) {
            $table->Increments('id');
            $table->unsignedInteger('cust_id');
            $table->string('address', 100);
            $table->unsignedInteger('district_id');
            $table->boolean('defualt');
            $table->boolean('active');
            $table->foreign('cust_id')->references('id')->on('customer_info');
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
        Schema::dropIfExists('cust_send_address');
    }
}
