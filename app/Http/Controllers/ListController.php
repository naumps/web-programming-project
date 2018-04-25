<?php

namespace App\Http\Controllers;

use App\Movie;
use App\User;
use App\UserList;
use Illuminate\Http\Request;
use Illuminate\Http\Response;

class ListController extends Controller
{
    public function __construct()
    {

        $this->middleware('checkIfUser:admin,editor,subscriber');

    }

    public function index()
    {

        $lists = UserList::all();
        return view('lists.index', compact('lists'));
    }

    public function show(UserList $list)
    {

        $movies = $list->movies;
        $user = auth()->user();
        return view('lists.show', compact(['movies', 'list', 'user']));
    }

    public function create(Request $request)
    {
        $movies = Movie::all();
        $user = auth()->user();


        $usersLists = count($user->lists);

        if ($user->subscription('basic')) {
            if ($usersLists == 3) {
                return redirect(route('change_plan'));
            }

        } elseif ($user->subscription('regular')) {
            if ($usersLists == 5) {
                return redirect(route('change_plan'));
            }

        }

        $movie = $request->get('movie');
        return view('lists.create', compact('movies', 'movie'));
    }

    public function store()
    {

        $post = request()->validate([
            'name' => 'required',

        ]);
        $post['user_id'] = auth()->id();
        $list = UserList::create($post);

        $movies = request()->get('movies');
        $list->movies()->attach($movies);

        return redirect(route('my_lists'));

    }

    public function edit(UserList $list)
    {

        $movies = $list->movies;

        $moviesThatAreNotInTheList = Movie::whereNotIn('id', $movies)->get();
        return view('lists.edit', compact(['list', 'movies', 'moviesThatAreNotInTheList']));
    }

    public function update(UserList $list)
    {
        $post = request()->validate([
            'name' => 'required',
        ]);
        $list->update($post);
        $selectedMovies = request()->get('movies');

        if (is_null($selectedMovies)) {
            $list->movies()->detach();
        } else {
            $list->movies()->sync($selectedMovies);
        }

        return redirect(route('my_lists'));
    }

    public function destroy(UserList $list)
    {

        $movies = $list->movies;
        $list->movies()->detach($movies);
        $list->delete();

        return back();
    }

    public function deleteMovieFromList(UserList $list, Movie $movie)
    {

        $list->movies()->detach($movie);

        return back();
    }

    public function myLists()
    {
        $user = auth()->user();
        $lists = $user->lists;
        return view('lists.myLists', compact(['lists', 'user']));
    }

    public function chooseLists(Movie $movie)
    {

        $lists = auth()->user()->lists;
        return view('lists.chooseLists', compact(['movie', 'lists']));
    }

    public function addMovieToLists(Movie $movie)
    {
        $lists = request()->get('lists');
        $movie->allLists()->syncWithoutDetaching($lists);

        return redirect(route('home'));
    }

    public function addMovie(Request $request)
    {

        $listId = $request->get('listId');
        $movieId = $request->get('movieId');
        $user = auth()->user();
        $list = UserList::find($listId);
        if ($user->subscription('basic')) {
            if (count($list->movies) == 3) {
                return '/subscription/change';
            }

        }

        $list = UserList::find($listId);
        $list->movies()->attach($movieId);
        return 'true';

    }

    public function deleteMovie(Request $request)
    {

        $listId = $request->get('listId');
        $movieId = $request->get('movieId');
        $list = UserList::find($listId);
        $list->movies()->detach($movieId);
    }


}
