<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateProductFormatsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('product_formats', function (Blueprint $table) {
            $table->Increments('id');
            $table->string('name', 50);
            $table->string('img_path', 50)->nullable()->default('/img/defualt_product.jpg');
            $table->unsignedInteger('category_id');
            $table->unsignedInteger('created_by');
            $table->boolean('active')->defualt(1);
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
        Schema::dropIfExists('product_formats');
    }
}
