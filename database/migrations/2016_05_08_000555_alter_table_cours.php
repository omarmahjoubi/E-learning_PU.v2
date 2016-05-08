<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AlterTableCours extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('cours', function ($table) {
            $table->integer('theme_id')->unsigned()->default(2);
            $table->foreign('theme_id')->references('id')->on('themes')->OnDelete('cascade');
            $table->integer('auteur_id')->unsigned()->nullable();
            $table->foreign('auteur_id')->references('id')->on('themes')->OnDelete('set null');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('cours', function(Blueprint $table){
            $table->dropColumn('theme_id');
            $table->dropColumn('auteur_id');
        });
    }
}
