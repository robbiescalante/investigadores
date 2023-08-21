<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class UpdateInvestigatorsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {

        Schema::table('investigators', function($table) {
            $table->foreignId('title_id')->references('id')->on('titles')->onDelete('cascade');
        });

    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::disableForeignKeyConstraints();
        Schema::table('investigators', function($table) {
            $table->dropForeign('title_id');
            $table->dropColumn('title_id');

        });
        Schema::enableForeignKeyConstraints();
    }
}
