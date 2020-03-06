<?php

use Illuminate\Support\Facades\Route;

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

Route::get('/', function () {
    return view('welcome');
});

Auth::routes();
Route::get('/home', 'HomeController@index')->name('home');
Route::get('restaurant-registration', 'RestaurantRegistrationController@form'); //shows registration form
Route::post('restaurant-registration', 'RestaurantRegistrationController@register'); //stores registration form
Route::get('restaurants', 'RestaurantController@index');
Route::get('restaurant/{id}', 'RestaurantController@show');
Route::post('restaurant/comment/{id}', 'CommentController@postComment');
Route::get('restaurant/edit-comment/{id}', 'CommentController@editComment');
Route::post('restaurant/edit-comment/{id}', 'CommentController@updateComment');
Route::get('restaurant/remove-comment/{id}', 'CommentController@removeComment');

Route::get('restaurant/reply/{comment_id}', 'CommentReplyController@editReply');
Route::post('restaurant/reply/{comment_id}', 'CommentReplyController@postReply');

Route::get('restaurant/meal/create', 'MealController@create');






