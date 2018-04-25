<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Actor extends Model
{

    protected $fillable = ['name','bio','location','birth_date','image_url','slug'];

    public function movies(){
        return $this->belongsToMany(Movie::class,'actor__movies');
    }

    public function getRouteKeyName()
    {
        return 'slug';
    }
}
