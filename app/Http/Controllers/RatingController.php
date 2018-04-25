<?php

namespace App\Http\Controllers;

use App\Movie;
use App\Rating;
use App\User;
use App\UserMovieRating;
use Illuminate\Http\Request;

class RatingController extends Controller
{
    public function store(Movie $movie,User $user){


        $rating = request()->validate([
           'rating' => 'required',

        ]);

        $user->ratedMovies()->attach($movie,$rating);

        return back();

    }

    public function update(Movie $movie,User $user){

        $post = request()->validate([
            'rating'=>'required'
        ]);
        UserMovieRating::where('user_id','=',$user->id)
            ->where('movie_id','=',$movie->id)->update(['rating'=>$post['rating']]);

        return back();
    }
}
