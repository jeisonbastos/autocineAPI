<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateShowsTable extends Migration
{
    /**
     * Run the migrations.
     * Se refiere a las funciones de la cartelera
     * @return void
     */
    public function up()
    {
        Schema::create('shows', function (Blueprint $table) {
            $table->increments('id');
            $table->date('fecha');
            $table->time('hora');
            $table->unsignedInteger('movie_id');
            $table->unsignedInteger('location_id');
            $table->boolean('visible_cartelera',false);
            $table->unsignedInteger('cantidad_espacios');
            $table->timestamps();
            #foreign keys
            $table->foreign('movie_id')->references('id')->on('movies');
            $table->foreign('location_id')->references('id')->on('locations');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('shows',function(Blueprint $table){
            $table->dropForeign('shows_movie_id_foreign');
            $table->dropForeign('shows_location_id_foreign');
        });
        Schema::dropIfExists('shows');
    }
}
