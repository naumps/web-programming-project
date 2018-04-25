<?php

namespace App\Http\Controllers;

use App\Category;
use App\Movie;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Input;

class CategoryController extends Controller
{

    public function __construct()
    {
        $this->middleware('auth')->except(['index','show']);
        $this->middleware('role:admin,editor')->except(['index','show']);
    }

    public function index()
    {
        return view('categories.index');
    }

    public function create()
    {

        $allCategories = Category::all();
        return view('categories.create', compact('allCategories'));
    }


    public function store()
    {
        $validatedPost = request()->validate([
            'name' => 'required|alpha|unique:categories,name'

        ]);
        $validatedPost['slug']= str_slug($validatedPost['name'],'_');
        $validatedPost['name'] = ucfirst($validatedPost['name']);
        Category::create($validatedPost);
        return back();
    }

    public function destroy(Category $category)
    {
        $selectedCategory = Input::get('name');
        Category::find($selectedCategory)->delete();
        return back();

    }

    public function delete()
    {
        $allCategories = Category::all();
        return view('categories.delete', compact('allCategories'));
    }


    public function createCategoryForMovie(Movie $movie)
    {

        $allCategories = Category::all();
        $movieCategories = $movie->categories;
        $movieCategoriesNames = array();

        foreach ($movieCategories as $category) {
            $movieCategoriesNames[] = $category['name'];
        }
        return view('categories.attachCategory', compact('movie', 'allCategories', 'movieCategoriesNames'));
    }

    public static function attachCategoryToMovie(Movie $movie, $selectedCategories)
    {

        $movieCategoryNames = $movie->getCategoryNames();

        CategoryController::deleteCategoryIfUnchecked($movie, $movieCategoryNames, $selectedCategories);

        CategoryController::attachCategoryToTheMovie($movie, $selectedCategories, $movieCategoryNames);

        return redirect(route('show_movie', $movie));
    }

    public function show(Category $category)
    {
        $movies = $category->movies;
        return view('categories.show', compact(['movies','category']));
    }

    /**
     * @param Movie $movie
     * @param $movieCategoryNames
     * @param $selectedCategories
     * @return void
     */
    private static function deleteCategoryIfUnchecked(Movie $movie, $movieCategoryNames, $selectedCategories)
    {
        if(is_null($selectedCategories)){
            $selectedCategories=array();
        }
        foreach ($movieCategoryNames as $category) {
            if (!in_array($category, $selectedCategories)) {
                $categoryToRemove = Category::where('name', '=', $category)->firstOrFail();
                $movie->categories()->detach($categoryToRemove);
            }
        }
    }

    /**
     * @param Movie $movie
     * @param $selectedCategories
     * @param $movieCategoryNames
     * @return void
     */
    public static function attachCategoryToTheMovie(Movie $movie, $selectedCategories, $movieCategoryNames)
    {
        if (!empty($selectedCategories)) {
            foreach ($selectedCategories as $category) {
                if (!in_array($category, $movieCategoryNames)) {

                    $newCategory = Category::where('name', '=', $category)->firstOrFail();

                    if (!$newCategory) {

                        $newCategory = Category::create(['name' => $category])->id;
                    }

                    $movie->categories()->attach($newCategory);
                }
            }
        }
    }


    private static function validateAndStoreCategoryFromTextbox(Movie $movie, $postCategoryName, $movieCategoryNames)
    {
        if (!empty($postCategoryName)) {
            $postCategoryName = ucfirst($postCategoryName);
            if (!in_array($postCategoryName, $movieCategoryNames)) {
                $newCategory = Category::create(['name' => $postCategoryName])->id;
                $movie->categories()->attach($newCategory);
            }
        }
    }

    public function attach(Movie $movie)
    {
        $categories = request()->get('category');
        $nameInTextBox = request()->get('name');
        CategoryController::attachCategoryToTheMovie($movie, $categories, []);

        CategoryController::validateAndStoreCategoryFromTextbox($movie, $nameInTextBox, []);

        return redirect(route('show_movie', $movie));

    }


}
