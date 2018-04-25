<?php

namespace App\Http\Controllers;

use App\Director;
use App\Movie;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Input;

class DirectorController extends Controller
{

    public function __construct()
    {
        $this->middleware('role:admin,editor')->except(['show', 'index']);
    }

    public function index()
    {

        $directors = Director::all();

        return view('directors.index', compact('directors'));
    }

    public function create(Movie $movie)
    {
        return view('directors.create', compact('movie'));
    }

    public function store()
    {

        $validatedDirector = request()->validate([
            'name' => 'required',
            'birth_date' => 'required',
            'location' => 'required',
            'image_url' => 'required',
            'bio' => 'required'
        ]);
        $validatedDirector['slug'] = str_slug($validatedDirector['name'], '_');

        Director::create($validatedDirector);

        return redirect(route('directors'));
    }

    public function show(Director $director)
    {

        $moviesOfDirector = $director->movies;
        return view("directors.show", compact('director', 'moviesOfDirector'));
    }

    public function edit(Director $director)
    {

        return view('directors.edit', compact('director'));
    }

    public function update(Director $director)
    {
        $post = request()->validate([
            'name' => 'required',
            'bio' => 'required',
            'birth_date' => 'required',
            'location' => 'required',
            'image_url' => 'required',
            'slug' => '',
        ]);
        if (empty($post['slug'])) {

            $post['slug'] = str_slug($post['name'], '_');
        }

        $director->update($post);

        return redirect(route('directors'));
    }

    public function destroy(Director $director)
    {
        $movies = $director->movies;
        if(!is_null($movies))
        {
            foreach ($movies as $movie) {
                $movie->director()->dissociate();
                $movie->save();
            }
        }
        $director->delete();
        return back();

    }


    private function getDirectorIdIfExists($directorName)
    {
        $tempDirector = Director::where('name', '=', $directorName)->first();
        if (!$tempDirector) {
            return 0;
        }
        return $tempDirector->id;

    }

    public function allDirectors(Movie $movie)
    {

        return view('directors.choose', compact('movie'));
    }

    public function attachDirector(Movie $movie, $directorId)
    {
        if ($directorId !== 0) {
            $movie->director_id = $directorId;
            $movie->save();
        }

        return redirect(route('show', $movie));

    }


}
