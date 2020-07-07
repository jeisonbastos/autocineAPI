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
        $clasificacion_producto = new \App\Product_Classification(); //1
        $clasificacion_producto->nombre = 'Chocolates';
        $clasificacion_producto->save();

        $clasificacion_producto = new \App\Product_Classification(); //2
        $clasificacion_producto->nombre = 'Golosinas Dulces';
        $clasificacion_producto->save();

        $clasificacion_producto = new \App\Product_Classification(); //3
        $clasificacion_producto->nombre = 'Golosinas Saladas';
        $clasificacion_producto->save();

        $clasificacion_producto = new \App\Product_Classification(); //4
        $clasificacion_producto->nombre = 'Deslactosados';
        $clasificacion_producto->save();

        $clasificacion_producto = new \App\Product_Classification(); //5
        $clasificacion_producto->nombre = 'Libre de Gluten';
        $clasificacion_producto->save();

        $clasificacion_producto = new \App\Product_Classification(); //6
        $clasificacion_producto->nombre = 'Libre en Sodio';
        $clasificacion_producto->save();

        $clasificacion_producto = new \App\Product_Classification(); //7
        $clasificacion_producto->nombre = 'Libre Azúcar';
        $clasificacion_producto->save();

        $clasificacion_producto = new \App\Product_Classification(); //8
        $clasificacion_producto->nombre = 'Bajos en Sodio';
        $clasificacion_producto->save();

        $clasificacion_producto = new \App\Product_Classification(); //9
        $clasificacion_producto->nombre = 'Bajos en Grasa';
        $clasificacion_producto->save();

        $clasificacion_producto = new \App\Product_Classification(); //10
        $clasificacion_producto->nombre = 'Vegetareano';
        $clasificacion_producto->save();

        $clasificacion_producto = new \App\Product_Classification(); //11
        $clasificacion_producto->nombre = 'Naturales';
        $clasificacion_producto->save();

        $clasificacion_producto = new \App\Product_Classification(); //12
        $clasificacion_producto->nombre = 'Gaseosa';
        $clasificacion_producto->save();

        $clasificacion_producto = new \App\Product_Classification(); //13
        $clasificacion_producto->nombre = 'Alcohólicas';
        $clasificacion_producto->save();

        $clasificacion_producto = new \App\Product_Classification(); //14
        $clasificacion_producto->nombre = 'Energéticas';
        $clasificacion_producto->save();

        $clasificacion_producto = new \App\Product_Classification(); //15
        $clasificacion_producto->nombre = 'Comida Japonesa';
        $clasificacion_producto->save();

        $clasificacion_producto = new \App\Product_Classification(); //16
        $clasificacion_producto->nombre = 'Comida Mexicana';
        $clasificacion_producto->save();

        $clasificacion_producto = new \App\Product_Classification(); //17
        $clasificacion_producto->nombre = 'Comida Americana';
        $clasificacion_producto->save();
    }
}
