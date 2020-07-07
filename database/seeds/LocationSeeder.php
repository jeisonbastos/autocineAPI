<?php

use Illuminate\Database\Seeder;

class LocationSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        /**$table->increments('id');
            $table->string('nombre',100);
            $table->string('provincia',25);
            $table->string('canton',100);
            $table->string('distrito',100);
            $table->string('direccion_exacta',150);
            $table->string('ubicacion_gps',100);
            $table->unsignedInteger('capacidad_maxima');*/
        $ubicacion = new \App\Location();
        $ubicacion->nombre = 'Autocine Belen';
        $ubicacion->provincia = 'Heredia';
        $ubicacion->canton = 'Belen';
        $ubicacion->distrito = 'San Antonio';
        $ubicacion->direccion_exacta = 'Centro de Eventos y Entretenimiento Pedregal';
        $ubicacion->ubicacion_gps = '';
        $ubicacion->capacidad_maxima = 125;
        $ubicacion->save();

        $ubicacion = new \App\Location();
        $ubicacion->nombre = 'Autocine Liberia';
        $ubicacion->provincia = 'Guanacaste';
        $ubicacion->canton = 'Liberia';
        $ubicacion->distrito = 'Liberia';
        $ubicacion->direccion_exacta = '2.5 Km. carretera a Aeropuerto';
        $ubicacion->ubicacion_gps = '';
        $ubicacion->capacidad_maxima = 100;
        $ubicacion->save();

        $ubicacion = new \App\Location();
        $ubicacion->nombre = 'Autocine Puntarenas';
        $ubicacion->provincia = 'Puntarenas';
        $ubicacion->canton = 'Esparza';
        $ubicacion->distrito = 'Caldera';
        $ubicacion->direccion_exacta = 'Antiguo Mirador El Nido de las Aguilas';
        $ubicacion->ubicacion_gps = '';
        $ubicacion->capacidad_maxima = 100;
        $ubicacion->save();
    }
}
