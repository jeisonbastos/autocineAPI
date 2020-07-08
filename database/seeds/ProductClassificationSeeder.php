<?php

use Illuminate\Database\Seeder;

class ProductClassificationSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $clasificacion_producto = new \App\ProductClassification(); //1
        $clasificacion_producto->nombre = 'Chocolates';
        $clasificacion_producto->save();

        $clasificacion_producto = new \App\ProductClassification(); //2
        $clasificacion_producto->nombre = 'Golosinas Dulces';
        $clasificacion_producto->save();

        $clasificacion_producto = new \App\ProductClassification(); //3
        $clasificacion_producto->nombre = 'Golosinas Saladas';
        $clasificacion_producto->save();

        $clasificacion_producto = new \App\ProductClassification(); //4
        $clasificacion_producto->nombre = 'Deslactosados';
        $clasificacion_producto->save();

        $clasificacion_producto = new \App\ProductClassification(); //5
        $clasificacion_producto->nombre = 'Libre de Gluten';
        $clasificacion_producto->save();

        $clasificacion_producto = new \App\ProductClassification(); //6
        $clasificacion_producto->nombre = 'Libre en Sodio';
        $clasificacion_producto->save();

        $clasificacion_producto = new \App\ProductClassification(); //7
        $clasificacion_producto->nombre = 'Libre Azúcar';
        $clasificacion_producto->save();

        $clasificacion_producto = new \App\ProductClassification(); //8
        $clasificacion_producto->nombre = 'Bajos en Sodio';
        $clasificacion_producto->save();

        $clasificacion_producto = new \App\ProductClassification(); //9
        $clasificacion_producto->nombre = 'Bajos en Grasa';
        $clasificacion_producto->save();

        $clasificacion_producto = new \App\ProductClassification(); //10
        $clasificacion_producto->nombre = 'Vegetareano';
        $clasificacion_producto->save();

        $clasificacion_producto = new \App\ProductClassification(); //11
        $clasificacion_producto->nombre = 'Naturales';
        $clasificacion_producto->save();

        $clasificacion_producto = new \App\ProductClassification(); //12
        $clasificacion_producto->nombre = 'Gaseosa';
        $clasificacion_producto->save();

        $clasificacion_producto = new \App\ProductClassification(); //13
        $clasificacion_producto->nombre = 'Alcohólicas';
        $clasificacion_producto->save();

        $clasificacion_producto = new \App\ProductClassification(); //14
        $clasificacion_producto->nombre = 'Energéticas';
        $clasificacion_producto->save();

        $clasificacion_producto = new \App\ProductClassification(); //15
        $clasificacion_producto->nombre = 'Comida Japonesa';
        $clasificacion_producto->save();

        $clasificacion_producto = new \App\ProductClassification(); //16
        $clasificacion_producto->nombre = 'Comida Mexicana';
        $clasificacion_producto->save();

        $clasificacion_producto = new \App\ProductClassification(); //17
        $clasificacion_producto->nombre = 'Comida Americana';
        $clasificacion_producto->save();
    }
}
