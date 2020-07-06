<?php

use Illuminate\Database\Seeder;

class TicketTypeSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        /*  $table->string('nombre', 50);
            $table->string('descripcion', 150);
            $table->decimal('precio', 6, 2, true);*/
        $tipo_tiquete=new \App\Ticket_Type();
        $tipo_tiquete->nombre='Tiquete Vehiculo Sedan';
        $tipo_tiquete->descripcion='Tiquete para vehículo sedan máximo 5 ocupantes';
        $tipo_tiquete->precio=17500.00;
        $tipo_tiquete->save();

        $tipo_tiquete = new \App\Ticket_Type();
        $tipo_tiquete->nombre = 'Tiquete Vehiculo Familar';
        $tipo_tiquete->descripcion = 'Tiquete para vehículo SUV máximo 9 ocupantes';
        $tipo_tiquete->precio = 22500.00;
        $tipo_tiquete->save();

        $tipo_tiquete = new \App\Ticket_Type();
        $tipo_tiquete->nombre = 'Tiquete Microbus';
        $tipo_tiquete->descripcion = 'Tiquete para Microbus máximo 15 ocupantes';
        $tipo_tiquete->precio = 32500.00;
        $tipo_tiquete->save();

        $tipo_tiquete = new \App\Ticket_Type();
        $tipo_tiquete->nombre = 'Tiquete Motocicleta';
        $tipo_tiquete->descripcion = 'Tiquete para motocicleta máximo 2 ocupantes';
        $tipo_tiquete->precio = 7500.00;
        $tipo_tiquete->save();

        $tipo_tiquete = new \App\Ticket_Type();
        $tipo_tiquete->nombre = 'Tiquete Bicicleta';
        $tipo_tiquete->descripcion = 'Tiquete para bicicleta, 1 ocupante';
        $tipo_tiquete->precio = 4500.00;
        $tipo_tiquete->save();
    }
}
