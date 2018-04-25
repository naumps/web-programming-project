<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class UserMovieRating extends Model
{
    protected $fillable = ['rating'];
    protected $table = 'user_movie_rating';
    public $timestamps = false;
}
