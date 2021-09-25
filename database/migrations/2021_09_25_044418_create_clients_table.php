<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateClientTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('clients', function (Blueprint $table) {
            $table->id();
            $table->string('client_name');
            $table->string('email');
            $table->string('contact_number');
            $table->string('ocn');
            $table->unsignedBigInteger('assoc_id');
            $table->foreign('assoc_id')->references('id')->on('associates');
            $table->unsignedBigInteger('mode_of_payment');
            $table->foreign('mode_of_payment_id')->references('id')->on('client_mode_of_payment');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('clients');
    }
}
