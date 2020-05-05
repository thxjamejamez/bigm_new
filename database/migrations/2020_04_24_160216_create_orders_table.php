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
            $table->unsignedBigInteger('order_by');
            $table->date('order_date');
            $table->date('send_date');
            $table->unsignedInteger('send_address_id');
            $table->unsignedInteger('order_status');
            $table->string('remark', 100)->nullable();
            $table->date('change_send_date')->nullable();
            $table->string('pay_file', 100)->nullable();
            $table->datetime('pay_datetime')->nullable();
            $table->double('total_pay', 8, 2)->nullable();
            $table->foreign('order_by')->references('id')->on('users');
            $table->foreign('send_address_id')->references('id')->on('cust_send_address');
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