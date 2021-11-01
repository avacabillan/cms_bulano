<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateClientTaxFilesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()

    {
        Schema::create('client_tax_files', function (Blueprint $table) {
            $table->id();
            $table->foreignId('tax_type_id');
            $table->foreignId('client_id');
            $table->string('file_name');
            $table->string('description');
            $table->string('file_type');
            $table->softDeletes();
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
        Schema::dropIfExists('client_tax_files');
    }
}
