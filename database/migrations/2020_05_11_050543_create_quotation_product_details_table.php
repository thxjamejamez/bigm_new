<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateQuotationProductDetailsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('quotation_product_details', function (Blueprint $table) {
            $table->unsignedInteger('quotation_product_id');
            $table->string('size', 50);
            $table->integer('qty');
            $table->double('price_per_unit', 8, 2)->nullable();
            $table->foreign('quotation_product_id')->references('id')->on('quotation_products');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('quotation_product_details');
    }
}
