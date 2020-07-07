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
        $reservacion = new \App\Reservation();
        $reservacion->user_id = 2;
        $reservacion->iva = $reservacion->cal_iva();
        $reservacion->total = $reservacion->calc_total();
        $reservacion->save();
        $reservacion->tickets()->attach([1, 2]);
        $reservacion->products()->attach([1 => ['cantidad' => 2], 5 => ['cantidad' => 2]]);

        $reservacion = new \App\Reservation();
        $reservacion->user_id = 4;
        $reservacion->iva = $reservacion->cal_iva();
        $reservacion->total = $reservacion->calc_total();
        $reservacion->save();
        $reservacion->tickets()->attach([3, 4]);
        $reservacion->products()->attach([8 => ['cantidad' => 2], 1 => ['cantidad' => 2], 8 => ['cantidad' => 1]]);

        $reservacion = new \App\Reservation();
        $reservacion->user_id = 2;
        $reservacion->iva = $reservacion->cal_iva();
        $reservacion->total = $reservacion->calc_total();
        $reservacion->save();
        $reservacion->tickets()->attach([5]);
        $reservacion->products()->attach([1 => ['cantidad' => 4], 5 => ['cantidad' => 5], 8 => ['cantidad' => 3]]);
    }
}
