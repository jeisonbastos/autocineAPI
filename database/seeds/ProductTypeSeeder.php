<?php

use Illuminate\Database\Seeder;

class ProductTypeSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        /*  $table->string('nombre', 50);
            $table->string('descripcion', 150);*/
        $tipo_producto=new \App\Product_Type();
        $tipo_producto->nombre='Bebidas';
        $tipo_producto->descripcion = '';
        $tipo_producto->save();

        $tipo_producto = new \App\Product_Type();
        $tipo_producto->nombre = 'Golosinas';
        $tipo_producto->descripcion = '';
        $tipo_producto->save();

        $tipo_producto = new \App\Product_Type();
        $tipo_producto->nombre = 'Comidas Rápidas';
        $tipo_producto->descripcion = '';
        $tipo_producto->save();

        $tipo_producto = new \App\Product_Type();
        $tipo_producto->nombre = 'Comidas Restaurante';
        $tipo_producto->descripcion = '';
        $tipo_producto->save();

        $tipo_producto = new \App\Product_Type();
        $tipo_producto->nombre = 'Postres';
        $tipo_producto->descripcion = '';
        $tipo_producto->save();

        $tipo_producto = new \App\Product_Type();
        $tipo_producto->nombre = 'Alimentos Mascotas';
        $tipo_producto->descripcion = '';
        $tipo_producto->save();

        $tipo_producto = new \App\Product_Type();
        $tipo_producto->nombre = 'Souvenirs';
        $tipo_producto->descripcion = '';
        $tipo_producto->save();
    }
}
