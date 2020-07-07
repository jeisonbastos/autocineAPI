<?php

use Illuminate\Database\Seeder;

class ShowSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        /*$table->date('fecha');
            $table->time('hora');
            $table->unsignedInteger('movie_id');
            $table->unsignedInteger('location_id');
            $table->boolean('visible_funcion',false);
            $table->unsignedInteger('cantidad_espacios');*/
        //id=1
        $funcion=new \App\Show();
        $funcion->fecha='2020-07-01';
        $funcion->hora='15:00';
        $funcion->movie_id=1;
        $funcion->location_id=1;
        $funcion->visible_funcion=true;
        $funcion->cantidad_espacios=100;
        $funcion->save();
        //id=2
        $funcion = new \App\Show();
        $funcion->fecha = '2020-07-01';
        $funcion->hora = '18:00';
        $funcion->movie_id = 1;
        $funcion->location_id = 1;
        $funcion->visible_funcion = true;
        $funcion->cantidad_espacios = 100;
        $funcion->save();
        //id=3
        $funcion = new \App\Show();
        $funcion->fecha = '2020-07-01';
        $funcion->hora = '19:30';
        $funcion->movie_id = 1;
        $funcion->location_id = 1;
        $funcion->visible_funcion = true;
        $funcion->cantidad_espacios = 100;
        $funcion->save();
        //id=4
        $funcion = new \App\Show();
        $funcion->fecha = '2020-07-01';
        $funcion->hora = '21:00';
        $funcion->movie_id = 1;
        $funcion->location_id = 1;
        $funcion->visible_funcion = true;
        $funcion->cantidad_espacios = 100;
        $funcion->save();
        //id=5
        $funcion = new \App\Show();
        $funcion->fecha = '2020-07-01';
        $funcion->hora = '15:00';
        $funcion->movie_id = 1;
        $funcion->location_id = 2;
        $funcion->visible_funcion = true;
        $funcion->cantidad_espacios = 100;
        $funcion->save();
    }
}
