<?php

namespace App\Http\Controllers;

use App\Actor;
use App\Actor_Movie;
use App\Movie;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Input;

class ActorController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth')->except(['index', 'show']);
        $this->middleware('role:admin,editor')->except(['index', 'show']);
    }


    public function index()
    {
        $actors = Actor::all();
        return view('actors.index', compact('actors'));
    }

    public function create()
    {


        return view('actors.create');
    }

    public function store(Request $request)
    {

        $validatedActor = request()->validate([
            'name' => 'required',
            'birth_date' => 'required',
            'location' => 'required',
            'bio' => 'required',
            'image_url' => 'required',

        ]);
        $validatedActor['slug'] = str_slug($validatedActor['name'],'_');



        Actor::create($validatedActor);


        return redirect(route('actors'));
    }

    public function destroy(Actor $actor)
    {
        Actor_Movie::where('actor_id', '=', $actor->id)->delete();
        $actor->delete();
        return back();
    }


    public function detach(Actor $actor, Movie $movie)
    {

        $movie->actors()->detach($actor);

        return back();
    }

    public function show(Actor $actor)
    {
        $movies = $actor->movies;
        return view('actors.show', compact('actor', 'movies'));
    }

    public function edit(Actor $actor)
    {
        return view('actors.edit', compact('actor'));
    }

    public function update(Actor $actor)
    {

        $post = request()->validate([
            'name' => 'required',
            'bio' => 'required',
            'image_url' => 'required',
            'location' => 'required',
            'birth_date' => 'required',
            'slug'=>'',
        ]);

        if(empty($post['slug'])){

            $post['slug'] = str_slug($post['name'],'_');
        }

        $actor->update($post);
        return redirect(route('show_actor', $actor));
    }

    public function chooseActor(Movie $movie)
    {
        $actors = Actor::all();
        return view('movies.addActor', compact(['movie', 'actors']));
    }

    public static function addActor(Movie $movie, $validatedActors, $actorsInTheMovie)
    {

        if (is_null($validatedActors)) {
            Actor_Movie::where('movie_id', '=', $movie->id)->delete();
        } else {
            foreach ($validatedActors as $id) {
                if (!in_array($id, $actorsInTheMovie)) {
                    $movie->actors()->attach($id);
                }

            }
            foreach ($actorsInTheMovie as $id) {
                if (!in_array($id, $validatedActors)) {
                    $movie->actors()->detach($id);
                }
            }
        }
    }

}
