<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateQuotationsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('quotations', function (Blueprint $table) {
            $table->Increments('id');
            $table->unsignedInteger('required_by');
            $table->tinyInteger('quotation_type')->default('1')->comment('1=know size, 2=unknow size');
            $table->unsignedInteger('quotation_status');
            $table->unsignedInteger('send_address');
            $table->foreign('required_by')->references('id')->on('users');
            $table->foreign('quotation_status')->references('id')->on('l_quotation_status');
            $table->foreign('send_address')->references('id')->on('cust_send_address');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('quotations');
    }
}