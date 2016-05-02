<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AlterCoursTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('cours', function ($table) {
            $table->integer('auteur_id')->unsigned()->nullable();
            $table->foreign('auteur_id')->references('id')->on('auteurs')->OnDelete('set null');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('cours', function ($table) {
            $table->dropColumn('auteur_id');
        });
    }
}
