<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Reservation extends Model
{
    //
    public function user()
    {
        return $this->belongsTo('App\User');
    }

    public function tickets()
    {
        return $this->belongsToMany('App\Ticket');
    }

    public function products()
    {
        return $this->belongsToMany('App\Product');
    }

}
