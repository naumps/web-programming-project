<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use \App\Actor;
use \App\Writer;
use \App\Director;
use \App\User;
use \App\Category;
use Laravel\Scout\Searchable;

class Movie extends Model
{

    use Searchable;

    protected $fillable = ['name', 'length', 'date', 'rating', 'desc', 'image_url', 'creator_id', 'slug'];

    public function actors()
    {
        return $this->belongsToMany(Actor::class, 'actor__movies');
    }


    public function director()
    {
        return $this->belongsTo(Director::class);
    }

    public function author()
    {
        return $this->belongsTo(User::class, 'creator_id', '');
    }

    public function categories()
    {
        return $this->belongsToMany(Category::class);
    }

    public function getCategoryNames()
    {
        $categories = $this->categories;
        $names = array();

        foreach ($categories as $category) {
            $names[] = $category->name;
        }

        return $names;
    }

    public function getRating()
    {
        return $this->ratedByUsers()->avg('rating');
    }

    public function ratedByUsers()
    {
        return $this->belongsToMany(User::class, 'user_movie_rating');
    }


    public function getRouteKeyName()
    {
        return 'slug';
    }


    public function allLists()
    {

        return $this->belongsToMany(UserList::class, 'list_movie','movie_id','list_id');
    }

    public function toSearchableArray()
    {
        $this->categories;
        $this->getRating();
        return $this->toArray();

    }


}
