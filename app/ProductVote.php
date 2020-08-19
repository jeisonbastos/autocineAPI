<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class ProductVote extends Model
{
    //
    public function product()
    {
        return $this->belongsTo('App\Product');
    }

    public function getTotalVotes()
    {
        return $this::count();
    }

    public function getProductVotesCount($product_id)
    {
        return $this::count()->where('product_id', $product_id);
    }

    public function getPuntuacion($product_id)
    {
        return ($this->getMovieVotesCount($product_id) * 10) / $this->getTotalVotes();
    }
}
