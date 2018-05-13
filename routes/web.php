<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/home', 'MovieController@index')->name('home');
Route::get('/', 'MovieController@index');
Route::get('/movies','MovieController@index')->name('movies');
Route::get('/movies/create','MovieController@create')->name('create_movie');
Route::get('/movies/my_movies','MovieController@myMovies')->name('my_movies');
Route::get('/movies/{movie}','MovieController@show')->name('show_movie');
Route::get('/movies/{movie}/edit','MovieController@edit')->name('edit_movie');
Route::delete('/movies/{movie}','MovieController@destroy')->name('delete_movie');
Route::put('/movies/{movie}','MovieController@update')->name('update_movie');
Route::post('/movies/{movie}','MovieController@saveEditedMovie')->name('save_edited_movie');
Route::post('/movies','MovieController@store')->name('store_movie');
Route::get('/movie/sync','MovieController@syncMovie')->name('syncFromOmdb');


Route::get('users','UserController@index')->name('users');
Route::get('/users/{user}/movies','UserController@show')->name('movies_of_user');
Route::get('/users/{user}/edit','UserController@edit')->name('edit_user');
Route::patch('users/{user}/edit','UserController@update')->name('update_user');
Route::get('/users/create','UserController@create')->name('create_user');
Route::post('/users/create','UserController@store')->name('create_user');

//Actors routes
Route::get('actors','ActorController@index')->name('actors');
Route::get('actors/create','ActorController@create')->name('create_actor');
Route::post('actors/create_actor','ActorController@store')->name('store_actor');
Route::get('actors/{actor}','ActorController@show')->name('show_actor');
Route::get('actors/{actor}/edit','ActorController@edit')->name('edit_actor');
Route::patch('actors/{actor}/edit','ActorController@update')->name('actor_update');
// check here
Route::delete('actor/{actor}','ActorController@destroy')->name('delete_actor');
Route::delete('actor/{actor}/delete_from/{movie}','ActorController@detach')->name('detach_actor');
Route::get('movies/{movie}/add-actor','ActorController@chooseActor')->name('choose_actor');
Route::post('movies/{movie}/add-actor','ActorController@addActor')->name('add_actor');



//Director routes
Route::get('directors','DirectorController@index')->name('directors');
Route::get('directors/create','DirectorController@create')->name('create_director');
Route::post('directors/create','DirectorController@store')->name('director_store');
Route::get('directors/{director}','DirectorController@show')->name('show_director');
Route::get('directors/{director}/edit','DirectorController@edit')->name('edit_director');
Route::patch('directors/{director}/edit','DirectorController@update')->name('update_director');
Route::delete('directors/{director}/delete','DirectorController@destroy')->name('delete_director');
Route::post('movies/{movie}/directors','DirectorController@attachDirector')->name('director_attach');

Route::get('categories/create','CategoryController@create')->name('create_category');
Route::post('categories/create','CategoryController@store')->name('store_category');
Route::get('categories/delete','CategoryController@delete')->name('delete_category');
Route::delete('categories/delete','CategoryController@destroy')->name('delete_category');
Route::get('movies/{movie}/add_categories','CategoryController@createCategoryForMovie')->name('create_category_for_movie');
Route::post('movies/{movie}/add_categories','CategoryController@attach')->name('attach_category');



Route::get('categories','CategoryController@index')->name('categories');

Route::get('categories/{category}','CategoryController@show')->name('show_category');

Route::post('ratings/{movie}/user/{user}','RatingController@store')->name('store_rating');
Route::patch('ratings/{movie}/user/{user}','RatingController@update')->name('update_rating');

//Lists routes
Route::get('/lists','ListController@index')->name('lists');
Route::get('/lists/my_lists','ListController@myLists')->name('my_lists');
Route::get('list/create','ListController@create')->name('create_list');
Route::get('list/create/{movie}','ListController@create')->name('create_list_with_movie');
Route::post('list/create','ListController@store')->name('store_list');
Route::get('/lists/{list}','ListController@show')->name('show_list');
Route::post('/lists/{list}delete_movie/{movie}','ListController@deleteMovieFromList')->name('remove_movie_from_list');
Route::get('/lists/{list}/edit','ListController@edit')->name('edit_list');
Route::post('/lists/{list}/edit','ListController@update')->name('update_list');
Route::delete('/lists/{list}/delete','ListController@destroy')->name('delete_list');
Route::get('lists/add_movie/{movie}','ListController@chooseLists')->name('add_movie_to_watchlist');
Route::post('lists/add_movie/{movie}','ListController@addMovieToLists')->name('add_movie');
Route::post('/list', 'ListController@addMovie');
Route::delete('/list', 'ListController@deleteMovie');


Route::get('/subscriptions','SubscriptionController@index')->name('subscriptions');
Route::post('/subscription/basic','SubscriptionController@storeBasic')->name('post_basic_subscription');
Route::post('/subscription/regular','SubscriptionController@storeRegular')->name('post_regular_subscription');
Route::post('/subscription/premium','SubscriptionController@storePremium')->name('post_premium_subscription');
Route::get('/subscription/subscribed','SubscriptionController@alreadySubscriber')->name('already_subscribed');
Route::get('/subscription/change','SubscriptionController@changePlan')->name('change_plan');
Route::post('/subscription/change','SubscriptionController@storeChangedPlan')->name('store_changed_plan');
Route::post('/subscription/cancel','SubscriptionController@cancelSubscription')->name('cancel_subscription');

Auth::routes();
//OAuth Routes

Route::get('login/{provider}','AuthController@redirectToProvider')->name('redirect_to_provider');
Route::get('login/{provider}/callback','AuthController@handleProviderCallback');

// Two Factor Auth
Route::get('/2fa','Google2FAController@index')->name('2fa');
Route::get('/2fa/enable', 'Google2FAController@enableTwoFactor')->name('enable_2fa');
Route::get('/2fa/disable', 'Google2FAController@disableTwoFactor')->name('disable_2fa');;
Route::get('/2fa/validate', 'AuthController@getValidateToken')->name('validate_2fa');
Route::get('2fa/confirm','AuthController@confirmTwoFactor')->name('confirm_2fa');
Route::post('/2fa/validate', ['middleware' => 'throttle:5', 'uses' => 'AuthController@postValidateToken']);


Route::get('admin','AdminController@index')->name('admin');
Route::post('admin','AdminController@store');
Route::get('admin/search-movies','AdminController@getMoviesWithTitle')->name('return');
Route::post('admin/search-movies','AdminController@storeMovie')->name('store_movie_from_omdb');

