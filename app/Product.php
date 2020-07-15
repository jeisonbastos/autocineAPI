<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    //
    public function product_type()
    {
        return $this->belongsTo('App\ProductType');
    }

    //
    public function reservations()
    {
        return $this->belongsToMany('App\Reservation')->withPivot('cantidad');
    }

    public function classifications()
    {
        return $this->belongsToMany('App\ProductClassification');
    }
}
