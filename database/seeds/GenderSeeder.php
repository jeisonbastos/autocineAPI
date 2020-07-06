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
        $genero=new \App\Gender();
        $genero->nombre= 'Acción';
        $genero->descripcion='';
        $genero->save();

        $genero = new \App\Gender();
        $genero->nombre = 'Ciencia ficción';
        $genero->descripcion = '';
        $genero->save();

        $genero = new \App\Gender();
        $genero->nombre = 'Comedia';
        $genero->descripcion = '';
        $genero->save();

        $genero = new \App\Gender();
        $genero->nombre = 'Drama';
        $genero->descripcion = '';
        $genero->save();

        $genero = new \App\Gender();
        $genero->nombre = 'Fantasía';
        $genero->descripcion = '';
        $genero->save();

        $genero = new \App\Gender();
        $genero->nombre = 'Melodrama';
        $genero->descripcion = '';
        $genero->save();

        $genero = new \App\Gender();
        $genero->nombre = 'Musical';
        $genero->descripcion = '';
        $genero->save();

        $genero = new \App\Gender();
        $genero->nombre = 'Romance';
        $genero->descripcion = '';
        $genero->save();

        $genero = new \App\Gender();
        $genero->nombre = 'Suspenso';
        $genero->descripcion = '';
        $genero->save();

        $genero = new \App\Gender();
        $genero->nombre = 'Terror';
        $genero->descripcion = '';
        $genero->save();

        $genero = new \App\Gender();
        $genero->nombre = 'Documental';
        $genero->descripcion = '';
        $genero->save();
    }
}
