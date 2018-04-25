<?php

namespace App\Http\Controllers;

use App\Actor;
use App\Actor_Movie;
use App\Category;
use App\Director;
use App\Movie;
use App\UserMovieRating;
use Faker\Provider\File;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Intervention\Image\Facades\Image;

class MovieController extends Controller
{

    public function __construct()
    {
        $this->middleware('auth')->except(['index', 'show']);
        $this->middleware('role:admin,editor')->except(['index', 'show']);
    }

    public function index()
    {

        $movies = Movie::orderBy('date', 'DESC')->paginate(9);

        if(auth()->check()){

            $lists = auth()->user()->lists;

        }else{
            $lists = array();
        }
        $categories = Category::all();

        return view('master', compact(['movies','lists','categories']));
    }

    public function show(Movie $movie)
    {

        $actors = $movie->actors;
        $director = $movie->director;
        $categories = $movie->categories;
        $allActors = Actor::all();
        $isRatedByAuthUser = null;
        if (auth()->check()) {

            $isRatedByAuthUser = UserMovieRating::where('user_id', '=', auth()->user()->id)
                ->where('movie_id', '=', $movie->id)->first();
            $lists = auth()->user()->lists;
        }else{
            $lists = array();
        }
        $movieRating = $movie->getRating();
        return view('movies.show',
            compact(['movie', 'actors', 'director', 'categories', 'allActors', 'isRatedByAuthUser', 'movieRating','lists']));
    }

    public function edit(Movie $movie)
    {

        $actors = $movie->actors;
        $allActors = Actor_Movie::where('movie_id', $movie->id)->pluck('actor_id');
        $actorsThatAreNotInTheMovie = Actor::whereNotIn('id', $allActors)->get();
        $movieCategoriesNames = $movie->categories->pluck('name')->toArray();
        $allCategories = Category::all();
        $directors = Director::all();

        $director = $movie->director;
        if ($director === null) {
            $director = array();
        }
        return view('movies.edit',
            compact('movie', 'actors', 'actorsThatAreNotInTheMovie', 'allCategories', 'movieCategoriesNames',
                'director', 'directors'));
    }

    private function update(Movie $movie, $validatedMovie)
    {
        $movie->update($validatedMovie);
    }

    public function store(Request $request)
    {


        $validatedMovie = request()->validate([
            'name' => 'required',
            'length' => 'required|numeric',
            'date' => 'required|',
            'desc' => 'required',
            'image_url' => '',
            'slug' => '',

        ]);
        $validatedMovie['slug'] = str_slug($validatedMovie['name'], '_');

        $validatedMovie['creator_id'] = auth()->user()->id;


        $validatedMovie = $this->storeImageUrl($request, $validatedMovie);


        $movie = Movie::create($validatedMovie);

        return redirect(route('create_category_for_movie', $movie));

    }

    public function create()
    {
        return view('movies.create');
    }

    public function destroy(Movie $movie)
    {

        $movie->allLists()->detach();
        $movie->ratedByUsers()->detach();
        $movie->actors()->detach();
        $movie->categories()->detach();

        $movie->delete();

        return redirect('movies');
    }

    public function myMovies()
    {

        $movies = Movie::where('creator_id', '=', auth()->user()->id)->orderBy('date', 'DESC')->paginate(9);
        $lists = auth()->user()->lists;
        return view('master', compact(['movies','lists']));
    }

    public function saveEditedMovie(Movie $movie, Request $request)
    {

        $validatedMovie = request()->validate([
            'name' => 'required',
            'length' => 'required|numeric',
            'date' => 'required|',
            'desc' => 'required',
            'image_url' => '',
            'slug' => '',

        ]);


        $validatedMovie = $this->storeImageUrl($request, $validatedMovie);

        if (empty($validatedMovie['slug'])) {

            $validatedMovie['slug'] = str_slug($validatedMovie['name'], '_');
        }
        $validatedActors = request()->get('actors');

        $validatedCategories = request()->get('category');
        if ($validatedCategories === null) {
            $validatedCategories = array();
        }

        $this->update($movie, $validatedMovie);

        $actorsInMovie = $movie->actors()->pluck('id')->all();

        $director = request()->get('director');

        if ($director === 0) {
            $movie->director()->dissociate();
            $movie->save();
        } else {
            $movie->director()->associate($director[0]);
            $movie->save();
        }


        ActorController::addActor($movie, $validatedActors, $actorsInMovie);
        CategoryController::attachCategoryToMovie($movie, $validatedCategories);

        return redirect(route('show_movie', $movie));


    }

    /**
     * @param Request $request
     * @param $validatedMovie
     * @return mixed
     */
    protected function storeImageUrl(Request $request, $validatedMovie)
    {
        if ($request->hasFile('image_url')) {
            $extension = $request->file('image_url')->getClientOriginalExtension();
            $fileName = $request->file('image_url')->getBasename();

            $request->file('image_url')->move(public_path() . '/storage/posters', $fileName . '.' . $extension);
            $path = 'storage/posters/' . $fileName . '.' . $extension;
            $validatedMovie['image_url'] = $path;

            Image::make($path)->fit(300,300)->save(public_path().'/storage/posters/'.$fileName.'300x300.'.$extension);

        }
        return $validatedMovie;
    }


    public function syncMovie(){
        return view('movies.syncFromOmdb');
    }


}
