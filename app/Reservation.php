<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use app\Ticket;

class Reservation extends Model
{
    //
    public function user()
    {
        return $this->belongsTo('App\User');
    }

    public function tickets()
    {
        return $this->belongsToMany('App\Ticket')->withPivot('cantidad');
    }

    public function products()
    {
        return $this->belongsToMany('App\Product')->withPivot('cantidad');
    }

    public function calc_iva()
    {
        return $this->calc_subTotal() * 0.13;
    }

    public function calc_subTotal()
    {
        $subtotal = 0;
        // $tickets = Ticket::array();
        // $tickets = $reservation_tickets;
        //Subtotal de tiquetes
        foreach ($this->tickets() as $x => $ticket) {
            $subtotal += $ticket->ticket_type->precio;
        }
        //Subtotal de productos
        foreach ($this->products() as $x => $product) {
            $subtotal += $product->precio;
        }

        return $subtotal;
    }

    public function calc_total()
    {
        return $this->calc_subTotal() + $this->calc_iva();
    }
}
