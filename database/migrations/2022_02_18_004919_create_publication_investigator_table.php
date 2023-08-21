<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePublicationInvestigatorTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('publication_investigator', function (Blueprint $table) {
            $table->id();
            $table->timestamps();
            $table->foreignId('investigator_id')->references('id')->on('investigators')->onDelete('cascade');
            $table->foreignId('publication_id')->references('id')->on('publications')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('publication_investigator');
    }
}
