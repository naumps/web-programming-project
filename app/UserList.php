<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use App\Movie;

class UserList extends Model
{
    protected $fillable = ['user_id','name'];
    protected $table = 'lists';
    public function movies(){

        return $this->belongsToMany(Movie::class,'list_movie','list_id');
    }

    public function createdBy(){
        return $this->belongsTo(User::class,'user_id');
    }

    public function contains(Movie $movie){
        $movies = $this->movies()->pluck('id')->all();
        return in_array($movie->id,$movies);
    }
}
