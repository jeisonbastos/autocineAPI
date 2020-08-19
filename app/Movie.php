<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Movie extends Model
{
    //
    public function classification()
    {
        return $this->belongsTo('App\Classification');
    }

    public function genders()
    {
        return $this->belongsToMany('App\Gender');
    }

    public function shows()
    {
        return $this->hasMany('App\Show');
    }

    public function votes(){
        return $this->hasMany('App\MovieVote');
    }
}
