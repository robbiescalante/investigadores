<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateSitesInvestigatorTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('sites_investigator', function (Blueprint $table) {
            $table->id();
            $table->timestamps();
            $table->foreignId('investigator_id')->references('id')->on('investigators')->onDelete('cascade');
            $table->foreignId('site_id')->references('id')->on('sites')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('sites_investigator');
    }
}
