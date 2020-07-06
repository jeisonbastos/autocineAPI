<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Location extends Model
{
    //
    public function shows()
    {
        return $this->hasMany('App\Show');
    }
}
