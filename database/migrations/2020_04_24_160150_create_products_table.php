<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateProductsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('products', function (Blueprint $table) {
            $table->Increments('id');
            $table->unsignedInteger('category_id');
            $table->string('img', 50);
            $table->string('name', 50);
            $table->string('size', 50);
            $table->string('detail', 200);
            $table->double('price', 8,2);
            $table->boolean('active');
            $table->timestamp('created_at');
            $table->unsignedBigInteger('created_by');
            $table->foreign('category_id')->references('id')->on('product_categories');
            $table->foreign('created_by')->references('id')->on('users');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('products');
    }
}
