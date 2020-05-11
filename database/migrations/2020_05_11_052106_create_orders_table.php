<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateOrdersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('orders', function (Blueprint $table) {
            $table->Increments('id');
            $table->unsignedInteger('quotation_id');
            $table->dateTime('send_datetime', 0);
            $table->dateTime('send_change_datetime', 0)->nullable();
            $table->unsignedInteger('order_status');
            $table->string('remark', 100);
            $table->timestamp('created_at', 0);
            $table->foreign('quotation_id')->references('id')->on('quotations');
            $table->foreign('order_status')->references('id')->on('l_order_status');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('orders');
    }
}