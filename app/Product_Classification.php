<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Product_Classification extends Model
{
    //
    public function productos()
    {
        return $this->belongsToMany('App\Product');
    }
}
