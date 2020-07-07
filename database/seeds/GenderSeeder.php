<?php

use Illuminate\Database\Seeder;

class GenderSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        /*$table->string('nombre',50);
          $table->string('descripcion',300);*/
        $genero = new \App\Gender(); //1
        $genero->nombre = 'Acción';
        $genero->descripcion = '';
        $genero->save();

        $genero = new \App\Gender(); //2
        $genero->nombre = 'Ciencia ficción';
        $genero->descripcion = '';
        $genero->save();

        $genero = new \App\Gender(); //3
        $genero->nombre = 'Comedia';
        $genero->descripcion = '';
        $genero->save();

        $genero = new \App\Gender(); //4
        $genero->nombre = 'Drama';
        $genero->descripcion = '';
        $genero->save();

        $genero = new \App\Gender(); //5
        $genero->nombre = 'Animadas';
        $genero->descripcion = '';
        $genero->save();

        $genero = new \App\Gender(); //6
        $genero->nombre = 'Fantasía';
        $genero->descripcion = '';
        $genero->save();

        $genero = new \App\Gender(); //7
        $genero->nombre = 'Melodrama';
        $genero->descripcion = '';
        $genero->save();

        $genero = new \App\Gender(); //8
        $genero->nombre = 'Musical';
        $genero->descripcion = '';
        $genero->save();

        $genero = new \App\Gender(); //9
        $genero->nombre = 'Romance';
        $genero->descripcion = '';
        $genero->save();

        $genero = new \App\Gender(); //10
        $genero->nombre = 'Suspenso';
        $genero->descripcion = '';
        $genero->save();

        $genero = new \App\Gender(); //11
        $genero->nombre = 'Terror';
        $genero->descripcion = '';
        $genero->save();

        $genero = new \App\Gender(); //12
        $genero->nombre = 'Documental';
        $genero->descripcion = '';
        $genero->save();
    }
}
