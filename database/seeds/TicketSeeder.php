<?php

use Illuminate\Database\Seeder;

class TicketSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        /*  $table->unsignedInteger('ticket_type_id');
            $table->unsignedInteger('show_id');*/
        $tiquete=new \App\Ticket();
        $tiquete->ticket_type_id=1;
        $tiquete->show_id=1;
        $tiquete->save();

        $tiquete = new \App\Ticket();
        $tiquete->ticket_type_id = 1;
        $tiquete->show_id = 1;
        $tiquete->save();

        $tiquete = new \App\Ticket();
        $tiquete->ticket_type_id = 1;
        $tiquete->show_id = 4;
        $tiquete->save();

        $tiquete = new \App\Ticket();
        $tiquete->ticket_type_id = 4;
        $tiquete->show_id = 1;
        $tiquete->save();

        $tiquete = new \App\Ticket();
        $tiquete->ticket_type_id = 3;
        $tiquete->show_id = 2;
        $tiquete->save();
    }
}
