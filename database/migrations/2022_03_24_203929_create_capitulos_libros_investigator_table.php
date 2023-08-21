<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateCapitulosLibrosInvestigatorTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('capitulos_libros_investigator', function (Blueprint $table) {
            $table->id();
            $table->foreignId('investigator_id')->references('id')->on('investigators')->onDelete('cascade');
            $table->foreignId('capitulos_libro_id')->references('id')->on('capitulos_libros')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('capitulos_libros_investigator');
    }
}
