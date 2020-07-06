<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Ticket_Type extends Model
{
    //
    public function tickets()
    {
        return $this->hasMany('App\Ticket');
    }
}
