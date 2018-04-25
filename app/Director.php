<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Director extends Model
{
    protected $fillable = ['name','bio','location','birth_date','image_url','slug'];

    public function movies(){
        return $this->hasMany(\App\Movie::class);
    }

    public function getRouteKeyName()
    {
        return 'slug';
    }

}
