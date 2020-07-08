<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Ticket extends Model
{
    //
    public function ticket_type()
    {
        return $this->belongsTo('App\TicketType');
    }

    public function show()
    {
        return $this->belongsTo('App\Show');
    }

    public function reservations()
    {
        return $this->belongsToMany('App\Reservation');
    }

}
