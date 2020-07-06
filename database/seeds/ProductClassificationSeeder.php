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
        $clasificacion_producto=new \App\Product_Classification();
        $clasificacion_producto->nombre = 'Chocolates';
        $clasificacion_producto->save();

        $clasificacion_producto = new \App\Product_Classification();
        $clasificacion_producto->nombre = 'Golosinas Dulces';
        $clasificacion_producto->save();

        $clasificacion_producto = new \App\Product_Classification();
        $clasificacion_producto->nombre = 'Golosinas Saladas';
        $clasificacion_producto->save();

        $clasificacion_producto = new \App\Product_Classification();
        $clasificacion_producto->nombre = 'Deslactosados';
        $clasificacion_producto->save();

        $clasificacion_producto = new \App\Product_Classification();
        $clasificacion_producto->nombre = 'Libre de Gluten';
        $clasificacion_producto->save();

        $clasificacion_producto = new \App\Product_Classification();
        $clasificacion_producto->nombre = 'Libre en Sodio';
        $clasificacion_producto->save();

        $clasificacion_producto = new \App\Product_Classification();
        $clasificacion_producto->nombre = 'Libre Azúcar';
        $clasificacion_producto->save();

        $clasificacion_producto = new \App\Product_Classification();
        $clasificacion_producto->nombre = 'Bajos en Sodio';
        $clasificacion_producto->save();

        $clasificacion_producto = new \App\Product_Classification();
        $clasificacion_producto->nombre = 'Bajos en Grasa';
        $clasificacion_producto->save();

        $clasificacion_producto = new \App\Product_Classification();
        $clasificacion_producto->nombre = 'Vegetareano';
        $clasificacion_producto->save();

        $clasificacion_producto = new \App\Product_Classification();
        $clasificacion_producto->nombre = 'Naturales';
        $clasificacion_producto->save();

        $clasificacion_producto = new \App\Product_Classification();
        $clasificacion_producto->nombre = 'Alcohólicas';
        $clasificacion_producto->save();

        $clasificacion_producto = new \App\Product_Classification();
        $clasificacion_producto->nombre = 'Energéticas';
        $clasificacion_producto->save();

        $clasificacion_producto = new \App\Product_Classification();
        $clasificacion_producto->nombre = 'Comida Japonesa';
        $clasificacion_producto->save();

        $clasificacion_producto = new \App\Product_Classification();
        $clasificacion_producto->nombre = 'Comida Mexicana';
        $clasificacion_producto->save();

        $clasificacion_producto = new \App\Product_Classification();
        $clasificacion_producto->nombre = 'Alcohólicos';
        $clasificacion_producto->save();
    }
}
