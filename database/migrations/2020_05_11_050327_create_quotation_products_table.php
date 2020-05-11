<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateQuotationProductsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('quotation_products', function (Blueprint $table) {
            $table->Increments('id');
            $table->unsignedInteger('quotation_id');
            $table->unsignedInteger('product_format_id');
            $table->foreign('quotation_id')->references('id')->on('quotations');
            $table->foreign('product_format_id')->references('id')->on('product_formats');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('quotation_products');
    }
}