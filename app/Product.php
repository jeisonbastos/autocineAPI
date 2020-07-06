<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    //
    public function product_type()
    {
        return $this->belongsTo('App\Product_Type');
    }

    //
    public function reservations()
    {
        return $this->belongsToMany('App\Reservation');
    }

    public function product_classifications()
    {
        return $this->belongsToMany('App\Product_Classification');
    }
}
