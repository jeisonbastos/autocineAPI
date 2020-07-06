<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class GenderMovie extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('gender_movie', function (Blueprint $table) {
            $table->unsignedInteger('gender_id');
            $table->unsignedInteger('movie_id');
            $table->timestamps();
            $table->foreign('gender_id')->references('id')->on('genders');
            $table->foreign('movie_id')->references('id')->on('movies');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('gender_movie', function (Blueprint $table) {
            $table->dropForeign('gender_movie_gender_id_foreign');
            $table->dropForeign('gender_movie_movie_id_foreign');
            #Opcional si necesito decido borrar la columna
            #$table->dropColumn('role_id');
        });
        Schema::dropIfExists('gender_movie');
    }
}
