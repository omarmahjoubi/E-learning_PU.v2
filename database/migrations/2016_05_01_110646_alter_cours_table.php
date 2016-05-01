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
            $table->dropColumn('theme');
            $table->integer('theme_id')->unsigned();
            $table->foreign('theme_id')->references('id')->on('themes')->OnDelete('cascade');
            $table->dropColumn('auteur');
            $table->integer('auteur_id')->unsigned()->nullable();
            $table->foreign('theme_id')->references('id')->on('auteurs')->OnDelete('set null');
        }); 
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('users', function(Blueprint $table){
            $table->dropColumn('theme_id');
            $table->dropColumn('auteur_id');
        });
    }
}
