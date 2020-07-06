<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Product_Type extends Model
{
    //
    public function products()
    {
        return $this->hasMany('App\Product');
    }
}
