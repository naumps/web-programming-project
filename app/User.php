<?php

namespace App;

use Carbon\Carbon;
use Illuminate\Notifications\Notifiable;
use Illuminate\Foundation\Auth\User as Authenticatable;
use \App\Movie;
use Laravel\Cashier\Billable;
use \App\Subscription;
use \App\Provider;


class User extends Authenticatable
{
    use Notifiable, Billable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name', 'email', 'password','role'
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token','google2fa_secret'
    ];

    public static function getRole(){
        if(auth()->check()){

            return auth()->user()->role;
        }else{
            return "guest";
        }
    }

    public function movies(){
        return $this->hasMany(Movie::class,'id');
    }

    public function hasRole($role){

        return $role === $this->getRole();
    }

    public function ratedMovies(){
        return $this->belongsToMany(Movie::class,'user_movie_rating');
    }

    public function getRouteKeyName()
    {
        return 'name';
    }

    public function lists(){
        return $this->hasMany(UserList::class);
    }

    public function getPlan(){
        $plan = Subscription::where('user_id','=',$this->id)->latest()->pluck('name')->all();
        return $plan;
    }

    public function getStripePlan(){
        $plan = Subscription::where('user_id','=',$this->id)->latest()->pluck('stripe_plan')->all();
        return $plan;
    }

    public function providers(){

        return $this->belongsToMany(Provider::class,'provider_user');
    }

    public function is2faEnabled(){
        $token = $this->google2fa_secret;
        if($token){
            return true;
        }
        return false;
    }


}
