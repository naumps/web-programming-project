<?php

namespace App\Http\Controllers;

use App\Movie;
use Carbon\Carbon;
use function GuzzleHttp\Psr7\copy_to_string;
use Illuminate\Http\Request;

class AdminController extends Controller
{
    public function index(){
        return view('admin.index');
    }

    public function store(){

        //fill database with movies
        /*$request['name'] = request()->get('Title');
        $request['length'] = explode(' ',request()->get('Runtime'))[0];
        $request['date']=Carbon::parse(request()->get('Released'));
        $request['desc']=request()->get('Plot');
        $request['image_url']=request()->get('Poster');
        $request['slug'] = str_slug($request['name'], '_');
        $request['creator_id'] = auth()->user()->id;
        $movie = Movie::create($request);
        return $movie;*/

       //attach categories to movies

        $movieCategories = explode(', ',request()->get('Genre'));
        $movie = Movie::where('name','=',request()->get('Title'))->firstOrFail();

        CategoryController::attachCategoryToTheMovie($movie,$movieCategories,[]);

        return $movieCategories;
    }


    public function getMoviesWithTitle(){

        $title = request()->get('name');
        $titles = file_get_contents('http://www.omdbapi.com/?apikey=74eeabf5&s='.$title);
        $movies= json_decode($titles)->Search;
        return view('movies.chooseMovie',compact('movies'));


    }

    public function storeMovie(){

        $id = request()->get('id');
        $movie = json_decode(file_get_contents('http://www.omdbapi.com/?apikey=74eeabf5&i='.$id));

        $request['name'] = $movie->Title;
        $request['length'] = (int)$movie->Runtime;
        $request['date']=Carbon::parse($movie->Released);
        $request['desc']=$movie->Plot;
        $request['image_url']=$movie->Poster;
        $request['slug'] = str_slug($request['name'], '_');
        $request['creator_id'] = auth()->user()->id;
        $doesExists = Movie::where('slug','=',$request['slug'])->first();

        if($doesExists){
            return redirect(route('show_movie',$doesExists));

        }else{

            $movieCategories = explode(', ',$movie->Genre);
            $movie = Movie::create($request);
            CategoryController::attachCategoryToTheMovie($movie,$movieCategories,[]);
        }

        return redirect(route('show_movie',$movie));


    }
}
