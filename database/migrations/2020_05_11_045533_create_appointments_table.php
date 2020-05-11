<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateAppointmentsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('appointments', function (Blueprint $table) {
            $table->unsignedInteger('quotation_id');
            $table->dateTime('appointment_datetime', 0);
            $table->dateTime('appointment_change_datetime', 0)->nullable();
            $table->unsignedInteger('appointment_status');
            $table->foreign('appointment_status')->references('id')->on('l_appointment_status');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('appointments');
    }
}