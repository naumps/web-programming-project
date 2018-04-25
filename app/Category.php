<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use App\Movie;

class Category extends Model
{
    protected $fillable = ['name','slug'];

    public function movies(){
        return $this->belongsToMany(Movie::class);
    }

    public function getRouteKeyName()
    {
        return 'slug';
    }
}
