<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateTaxFilesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('tax_files', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('tax_type_id');
            $table->foreign('tax_type_id')->references('id')->on('client_tax_type');
            $table->string('file_name');
            $table->string('description');
            $table->string('file_type');
            $table->timestamp('uploaded_at')->useCurrent();
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
        Schema::dropIfExists('tax_files');
    }
}
