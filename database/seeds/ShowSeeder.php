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
            $table->boolean('visible_cartelera',false);
            $table->unsignedInteger('cantidad_espacios');*/
        $cartelera=new \App\Show();
        $cartelera->fecha='2020-07-01';
        $cartelera->hora='15:00';
        $cartelera->movie_id=1;
        $cartelera->location_id=1;
        $cartelera->visible_cartelera=true;
        $cartelera->cantidad_espacios=100;
        $cartelera->save();

        $cartelera = new \App\Show();
        $cartelera->fecha = '2020-07-01';
        $cartelera->hora = '18:00';
        $cartelera->movie_id = 1;
        $cartelera->location_id = 1;
        $cartelera->visible_cartelera = true;
        $cartelera->cantidad_espacios = 100;
        $cartelera->save();

        $cartelera = new \App\Show();
        $cartelera->fecha = '2020-07-01';
        $cartelera->hora = '19:30';
        $cartelera->movie_id = 1;
        $cartelera->location_id = 1;
        $cartelera->visible_cartelera = true;
        $cartelera->cantidad_espacios = 100;
        $cartelera->save();

        $cartelera = new \App\Show();
        $cartelera->fecha = '2020-07-01';
        $cartelera->hora = '21:00';
        $cartelera->movie_id = 1;
        $cartelera->location_id = 1;
        $cartelera->visible_cartelera = true;
        $cartelera->cantidad_espacios = 100;
        $cartelera->save();

        $cartelera = new \App\Show();
        $cartelera->fecha = '2020-07-01';
        $cartelera->hora = '15:00';
        $cartelera->movie_id = 1;
        $cartelera->location_id = 2;
        $cartelera->visible_cartelera = true;
        $cartelera->cantidad_espacios = 100;
        $cartelera->save();

    }
}
