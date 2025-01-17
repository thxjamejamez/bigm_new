<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateOrderPaymentsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('order_payments', function (Blueprint $table) {
            $table->unsignedInteger('order_id');
            $table->string('bank_name', 50);
            $table->string('name_sender', 50);
            $table->double('amount', 8, 2);
            $table->dateTime('payment_datetime', 0);
            $table->string('remark', 100)->nullable();
            $table->string('img_slip', 50);
            $table->foreign('order_id')->references('id')->on('orders');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('order_payments');
    }
}