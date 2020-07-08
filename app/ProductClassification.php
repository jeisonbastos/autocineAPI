<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class ProductClassification extends Model
{
    //
    public function productos()
    {
        return $this->belongsToMany('App\Product');
    }
}
