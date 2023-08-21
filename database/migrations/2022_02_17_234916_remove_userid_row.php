<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class RemoveUseridRow extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('investigators', function($table) {
             $table->dropColumn('user_id');
             $table->string('cv')->nullable()->change();
             $table->integer('sites_id')->nullable();
             $table->string('email')->default("No proporcionado");
          });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('investigators', function($table) {
             $table->integer('user_id');
             $table->string('cv')->nullable(false)->change();
             $table->dropColumn('sites_id');
             $table->dropColumn('email');
          });
    }
}
