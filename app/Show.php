<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Show extends Model
{
    //
    public function location()
    {
        return $this->belongsTo('App\Location');
    }

    public function movie()
    {
        return $this->belongsTo('App\Movie');
    }

    public function tickets()
    {
        return $this->hasMany('App\Ticket');
    }
}
