<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use \App\User;

class Provider extends Model
{

    protected $fillable = ['name'];
    public function users(){
        return $this->belongsToMany(User::class,'provider_user');
    }
}
