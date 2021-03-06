<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AddFavoriteidToFavoritesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('favorites', function (Blueprint $table) {
           $table->integer('u_id')->unsigned()->index();
            $table->integer('fav_id')->unsigned()->index();
            

            // Foreign key setting
            $table->foreign('u_id')->references('id')->on('users')->onDelete('cascade');
            $table->foreign('fav_id')->references('id')->on('microposts')->onDelete('cascade');

            // Do not allow duplication of combination of user_id and follow_id
            $table->unique(['u_id', 'fav_id']);
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('favorites');
    }
}
