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
use App\Company;
use App\Subcategory;

Route::get('/', function () {
    $categories = Category::all();
    $subcategories = Subcategory::all();
    $companies = Company::all();
    return view('welcome',compact('categories', 'subcategories', 'companies'));
});

Route::get('/subcategory/{id}' , function ($id) {
    $categories = Category::all();
    $subcategories = Subcategory::all();
    $companies = Company::query()
        ->where('subcategory_id', '=', "{$id}")
        ->get();

    return view('welcome' , compact('categories', 'subcategories', 'companies'));

});

Route::get('/details/{id}' , function ($id) {
    $categories = Category::all();
    $subcategories = Subcategory::all();
    $company = Company::findOrFail($id);

    return view('details' , compact('categories', 'subcategories', 'company'));

});

//Route::resource('', 'CompanyController');


Route::auth();

Route::get('/home', 'HomeController@index');
