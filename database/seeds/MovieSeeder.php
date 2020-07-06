<?php

use Illuminate\Database\Seeder;

class MovieSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        /*$table->string('nombre', 200);
            $table->unsignedInteger('classification_id');
            $table->boolean('habilitada', false);
            $table->text('sinopsis');
            $table->decimal('puntuacion', 2, 1, true);
            $table->timestamps();
            #foreign keys
            $table->foreign('classification_id')->references('id')->on('classifications');*/

        $pelicula=new \App\Movie();
        $pelicula->nombre='';
        $pelicula->classification_id=1; //TP - Todo Público
        $pelicula->habilitada=false;
        $pelicula->sinopsis='';
        $pelicula->puntuacion=8.8;
        $pelicula->save();
        // Para hacer insert en tabla pivote
        $pelicula->genders()->attach([2,3]);

        $pelicula = new \App\Movie();
        $pelicula->nombre = '';
        $pelicula->classification_id = 1; //TP - Todo Público
        $pelicula->habilitada = false;
        $pelicula->sinopsis = '';
        $pelicula->puntuacion = 8.8;
        $pelicula->save();
        // Para hacer insert en tabla pivote
        $pelicula->genders()->attach([2, 3]);

        $pelicula = new \App\Movie();
        $pelicula->nombre = '';
        $pelicula->classification_id = 1; //TP - Todo Público
        $pelicula->habilitada = false;
        $pelicula->sinopsis = '';
        $pelicula->puntuacion = 8.8;
        $pelicula->save();
        // Para hacer insert en tabla pivote
        $pelicula->genders()->attach([2, 3]);

    }
}
