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
        return $this->belongsToMany('App\Ticket')->withPivot('cantidad');
    }

    public function products()
    {
        return $this->belongsToMany('App\Product')->withPivot('cantidad');
    }

    public function calc_iva()
    {
        return 0.0;
    }

    public function calc_total()
    {
        return $this->calc_iva() * 1.00;
    }
}
