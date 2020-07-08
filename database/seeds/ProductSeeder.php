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
            $table->decimal('tamano_presentacion');
            $table->decimal('precio');*/

        $producto=new \App\Product();
        $producto->nombre='Palomitas de Maíz Matequilla';
        $producto->descripcion = 'Palomitas de maíz con mantequilla';
        $producto->product_type_id = 2;
        $producto->tamano_presentacion = 100.00;
        $producto->precio = 1500.00;
        $producto->save();
        $producto->product_classifications()->attach([3,8,11]);

        $producto = new \App\Product();
        $producto->nombre = 'Palomitas de Maíz Saladas';
        $producto->descripcion = 'Palomitas de maíz con mantequilla y sal';
        $producto->product_type_id = 2;
        $producto->tamano_presentacion = 200.00;
        $producto->precio = 1500.00;
        $producto->save();
        $producto->product_classifications()->attach([3]);

        $producto = new \App\Product();
        $producto->nombre = 'Palomitas de Maíz Saladas';
        $producto->descripcion = 'Palomitas de maíz con mantequilla y sal';
        $producto->product_type_id = 2;
        $producto->tamano_presentacion =350.00;
        $producto->precio = 1500.00;
        $producto->save();
        $producto->product_classifications()->attach([3]);

        $producto = new \App\Product();
        $producto->nombre = 'Coca Cola Zero';
        $producto->descripcion = 'Refresco sabor a cola gaseoso de fuente';
        $producto->product_type_id = 1;
        $producto->tamano_presentacion = 32.00;
        $producto->precio = 1450.00;
        $producto->save();
        $producto->product_classifications()->attach([7,12]);

        $producto = new \App\Product();
        $producto->nombre = 'Coca Cola Regular';
        $producto->descripcion = 'Refresco sabor a cola gaseoso de fuente';
        $producto->product_type_id = 1;
        $producto->tamano_presentacion = 20.00;
        $producto->precio = 1200.00;
        $producto->save();
        $producto->product_classifications()->attach([12]);

        $producto = new \App\Product();
        $producto->nombre = 'Coca Cola Regular';
        $producto->descripcion = 'Refresco sabor a cola gaseoso de fuente';
        $producto->product_type_id = 1;
        $producto->tamano_presentacion = 16.00;
        $producto->precio = 800.00;
        $producto->save();
        $producto->product_classifications()->attach([12]);

        $producto = new \App\Product();
        $producto->nombre = 'Canada Ginger Ale';
        $producto->descripcion = 'Refresco sabor a Ginger Ale gaseoso de fuente';
        $producto->product_type_id = 1;
        $producto->tamano_presentacion = 16.00;
        $producto->precio = 800.00;
        $producto->save();
        $producto->product_classifications()->attach([12]);

        $producto = new \App\Product();
        $producto->nombre = 'Nachos Regulares';
        $producto->descripcion = 'Nachos de Maíz con salsa de queso Cheedar';
        $producto->product_type_id = 3;
        $producto->tamano_presentacion = 75.00;
        $producto->precio = 2100.00;
        $producto->save();
        $producto->product_classifications()->attach([3]);

        $producto = new \App\Product();
        $producto->nombre = 'Hamburguesa Queso Regular';
        $producto->descripcion = 'Hamburgesa de Carne con queso Tipo americano, pepinillos y salsas';
        $producto->product_type_id = 3;
        $producto->tamano_presentacion = 1.00;
        $producto->precio = 1850.00;
        $producto->save();
        $producto->product_classifications()->attach([17]);

        $producto = new \App\Product();
        $producto->nombre = 'Pizza Jamon y Hongos Mediana';
        $producto->descripcion = 'Pizza de la casa con salsa especial de tomate, queso mozarella, Jamon y Hongos';
        $producto->product_type_id = 3;
        $producto->tamano_presentacion = 1.00;
        $producto->precio = 6000.00;
        $producto->save();
        $producto->product_classifications()->attach([17]);

    }
}
