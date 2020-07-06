<?php

use Illuminate\Database\Seeder;

class ReservationSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        /* $table->unsignedInteger('user_id');
           $table->decimal('iva',6,2,true);
           $table->decimal('total', 6, 2, true);*/
        $reservacion=new \App\Reservation();
        $reservacion->user_id=2;
        $reservacion->iva= $reservacion->cal_iva();
        
    }
}
