<?php

use Illuminate\Database\Seeder;

class ProductSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        /*  $table->increments('id');
            $table->string('nombre',75);
            $table->string('descripcion',250);
            $table->unsignedInteger('product_type_id');
            $table->decimal('tamano_presentacion',4,2,true);
            $table->decimal('precio',6,2,true);*/

        $producto=new \App\Product();
        $producto->nombre='';
        $producto->descripcion = '';
        $producto->tipo_producto = 1;
        $producto->tamaño = 0.00;
        $producto->precio = 0.00;
        $producto->save();
        $producto->product_classifications()->attach([]);

        $producto = new \App\Product();
        $producto->nombre = '';
        $producto->descripcion = '';
        $producto->tipo_producto = 1;
        $producto->tamaño = 0.00;
        $producto->precio = 0.00;
        $producto->save();
        $producto->product_classifications()->attach([]);

        $producto = new \App\Product();
        $producto->nombre = '';
        $producto->descripcion = '';
        $producto->tipo_producto = 1;
        $producto->tamaño = 0.00;
        $producto->precio = 0.00;
        $producto->save();
        $producto->product_classifications()->attach([]);

        $producto = new \App\Product();
        $producto->nombre = '';
        $producto->descripcion = '';
        $producto->tipo_producto = 1;
        $producto->tamaño = 0.00;
        $producto->precio = 0.00;
        $producto->save();
        $producto->product_classifications()->attach([]);

        $producto = new \App\Product();
        $producto->nombre = '';
        $producto->descripcion = '';
        $producto->tipo_producto = 1;
        $producto->tamaño = 0.00;
        $producto->precio = 0.00;
        $producto->save();
        $producto->product_classifications()->attach([]);

        $producto = new \App\Product();
        $producto->nombre = '';
        $producto->descripcion = '';
        $producto->tipo_producto = 1;
        $producto->tamaño = 0.00;
        $producto->precio = 0.00;
        $producto->save();
        $producto->product_classifications()->attach([]);

    }
}
