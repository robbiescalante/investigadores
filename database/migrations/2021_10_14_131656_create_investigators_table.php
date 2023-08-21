<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateInvestigatorsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('investigators', function (Blueprint $table) {
            $table->id();
            $table->foreignId('user_id');
            $table->foreignId('institute_id');
            $table->string('picture');
            $table->string('name');
            $table->text('description');
            $table->string('number');
            $table->string('office');
            $table->string('website');
            $table->string('cv');
            $table->string('slug')->unique();
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
        Schema::dropIfExists('investigators');
    }
}
