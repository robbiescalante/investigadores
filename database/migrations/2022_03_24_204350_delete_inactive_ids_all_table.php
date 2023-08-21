<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class DeleteInactiveIdsAllTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::disableForeignKeyConstraints();

        Schema::table('publications', function($table) {
            $table->dropForeign(['investigator_id']);
            $table->dropColumn('investigator_id');
        });
        Schema::table('sites', function($table) {
            $table->dropForeign(['investigator_id']);
            $table->dropColumn('investigator_id');
        });
        Schema::table('studies', function($table) {
            $table->dropForeign(['investigator_id']);
            $table->dropColumn('investigator_id');
        });
        Schema::table('investigators', function($table) {
            $table->dropColumn('institute_id');
            $table->dropColumn('sites_id');
        });

        Schema::enableForeignKeyConstraints();
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('investigators', function($table) {
            $table->foreignId('institute_id');
            $table->foreignId('sites_id');
            });

        Schema::table('publications', function($table) {
            $table->foreignId('investigator_id')->references('id')->on('investigators')->onDelete('cascade');
            });

        Schema::table('sites', function($table) {
            $table->foreignId('investigator_id')->references('id')->on('investigators')->onDelete('cascade');
            });

        Schema::table('studies', function($table) {
            $table->foreignId('investigator_id')->references('id')->on('investigators')->onDelete('cascade');
            });
    }
}
