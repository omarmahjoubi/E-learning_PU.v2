<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AlterTableUser extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('users', function ($table) {
            $table->string('pseudo')->default('pseudo');
            $table->string('nom')->default('nom');
            $table->string('prenom')->default('prenom');
            $table->string('sexe')->nullable();
            $table->string('telephone')->nullable();
           


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
            $table->dropColumn('pseudo');
            $table->dropColumn('nom');
            $table->dropColumn('prenom');
            $table->dropColumn('sexe');
            $table->dropColumn('telephone');
        });
    }
}
