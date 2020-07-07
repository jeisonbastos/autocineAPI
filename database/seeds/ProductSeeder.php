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
        $producto->nombre='Palomitas de Maíz Matequilla';
        $producto->descripcion = 'Palomitas de maíz con mantequilla';
        $producto->tipo_producto = 2;
        $producto->tamaño = 100.00;
        $producto->precio = 1500.00;
        $producto->save();
        $producto->product_classifications()->attach([3,8,11]);

        $producto = new \App\Product();
        $producto->nombre = 'Palomitas de Maíz Saladas';
        $producto->descripcion = 'Palomitas de maíz con mantequilla y sal';
        $producto->tipo_producto = 2;
        $producto->tamaño = 200.00;
        $producto->precio = 1500.00;
        $producto->save();
        $producto->product_classifications()->attach([3]);

        $producto = new \App\Product();
        $producto->nombre = 'Palomitas de Maíz Saladas';
        $producto->descripcion = 'Palomitas de maíz con mantequilla y sal';
        $producto->tipo_producto = 2;
        $producto->tamaño =350.00;
        $producto->precio = 1500.00;
        $producto->save();
        $producto->product_classifications()->attach([3]);

        $producto = new \App\Product();
        $producto->nombre = 'Coca Cola Zero';
        $producto->descripcion = 'Refresco sabor a cola gaseoso de fuente';
        $producto->tipo_producto = 1;
        $producto->tamaño = 32.00;
        $producto->precio = 1450.00;
        $producto->save();
        $producto->product_classifications()->attach([7,12]);

        $producto = new \App\Product();
        $producto->nombre = 'Coca Cola Regular';
        $producto->descripcion = 'Refresco sabor a cola gaseoso de fuente';
        $producto->tipo_producto = 1;
        $producto->tamaño = 20.00;
        $producto->precio = 1200.00;
        $producto->save();
        $producto->product_classifications()->attach([12]);

        $producto = new \App\Product();
        $producto->nombre = 'Coca Cola Regular';
        $producto->descripcion = 'Refresco sabor a cola gaseoso de fuente';
        $producto->tipo_producto = 1;
        $producto->tamaño = 16.00;
        $producto->precio = 800.00;
        $producto->save();
        $producto->product_classifications()->attach([12]);

        $producto = new \App\Product();
        $producto->nombre = 'Canada Ginger Ale';
        $producto->descripcion = 'Refresco sabor a Ginger Ale gaseoso de fuente';
        $producto->tipo_producto = 1;
        $producto->tamaño = 16.00;
        $producto->precio = 800.00;
        $producto->save();
        $producto->product_classifications()->attach([12]);

        $producto = new \App\Product();
        $producto->nombre = 'Nachos Regulares';
        $producto->descripcion = 'Nachos de Maíz con salsa de queso Cheedar';
        $producto->tipo_producto = 3;
        $producto->tamaño = 75.00;
        $producto->precio = 2100.00;
        $producto->save();
        $producto->product_classifications()->attach([3]);

        $producto = new \App\Product();
        $producto->nombre = 'Hambuerguesa Queso Regular';
        $producto->descripcion = 'Hamburgesa de Carne con queso Tipo americano, pepinillos y salsas';
        $producto->tipo_producto = 3;
        $producto->tamaño = 1.00;
        $producto->precio = 1850.00;
        $producto->save();
        $producto->product_classifications()->attach([17]);

        $producto = new \App\Product();
        $producto->nombre = 'Pizza Jamon y Hongos Mediana';
        $producto->descripcion = 'Pizza de la casa con salsa especial de tomate, queso mozarella, Jamon y Hongos';
        $producto->tipo_producto = 3;
        $producto->tamaño = 1.00;
        $producto->precio = 6000.00;
        $producto->save();
        $producto->product_classifications()->attach([17]);

    }
}
