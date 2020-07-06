<?php

use Illuminate\Database\Seeder;

class ClassificationSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        /*$table->increments('id');
            $table->string('siglas',5);
            $table->string('descripcion',200);
            $table->timestamps();*/
        $clasificacion=new \App\Classification();
        $clasificacion->siglas='TP';
        $clasificacion->descripcion= 'Todo Público';
        $clasificacion->save();

        $clasificacion = new \App\Classification();
        $clasificacion->siglas = 'EN';
        $clasificacion->descripcion = 'Especial Niños y Niñas';
        $clasificacion->save();

        $clasificacion = new \App\Classification();
        $clasificacion->siglas = 'TP12';
        $clasificacion->descripcion = 'Todo público, niños menores de 12 acompañados de un adulto';
        $clasificacion->save();

        $clasificacion = new \App\Classification();
        $clasificacion->siglas = 'M12';
        $clasificacion->descripcion = 'Mayores de 12 años';
        $clasificacion->save();

        $clasificacion = new \App\Classification();
        $clasificacion->siglas = 'M15';
        $clasificacion->descripcion = 'Mayores de 15 años';
        $clasificacion->save();

        $clasificacion = new \App\Classification();
        $clasificacion->siglas = 'M18';
        $clasificacion->descripcion = 'Mayores de 18 años';
        $clasificacion->save();
    }
}
