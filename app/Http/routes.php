<?php

/*
|--------------------------------------------------------------------------
| Application Routes
|--------------------------------------------------------------------------
|
| Here is where you can register all of the routes for an application.
| It's a breeze. Simply tell Laravel the URIs it should respond to
| and give it the controller to call when that URI is requested.
|
*/

use App\Category;
use App\Subcategory;

Route::get('/', function () {
    $categories = Category::all();
    $subcategories = Subcategory::all();
    return view('welcome',compact('categories', 'subcategories'));
});

Route::auth();

Route::get('/home', 'HomeController@index');
