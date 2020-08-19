<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class MovieVote extends Model
{
    //
    public function movie()
    {
        return $this->belongsTo('App\Movie');
    }

    public function getTotalVotes()
    {
        return $this::count();
    }

    public function getMovieVotesCount($movie_id)
    {
        return $this::count()->where('movie_id', $movie_id);
    }

    public function getPuntuacion($movie_id)
    {
        return ($this->getMovieVotesCount($movie_id) * 10) / $this->getTotalVotes();
    }
}
