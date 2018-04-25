<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Bootstrap any application services.
     *
     * @return void
     */

    //Da proveram dali edit imat role
    public function boot()
    {
        view()->composer([
            'master','movies.edit',
            'movies.show','actors.index',
            'categories.index','directors.index',
            'actors.show','categories.show'],function($view){

            $view->with('role',\App\User::getRole());
        });

        view()->composer('directors.choose',function ($view){
           $view->with('directors',\App\Director::all());
        });

        view()->composer('categories.index',function($view){
            $view->with('categories',\App\Category::all());
        });
    }

    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        //
    }
}
