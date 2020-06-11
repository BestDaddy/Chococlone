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
use App\Review;
use App\Subcategory;
use App\Http\Requests;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Input;

Route::get('/', function () {
    $categories = Category::all();
    $subcategories = Subcategory::all();
    $companies = Company::all();
    return view('welcome',compact('categories', 'subcategories', 'companies'));
});


Route::get('/getSub/{id}',  function ($id) {
    $subcategories = Subcategory::query()->where('category_id',"=",  "{$id}")->get()->pluck('name', 'id');
    return json_encode($subcategories);
});

Route::get('/subcategory/{id}' , function ($id) {
    $categories = Category::all();
    $subcategories = Subcategory::all();
    $companies = Company::query()
        ->where('subcategory_id', '=', "{$id}")
        ->get();

    return view('welcome' , compact('categories', 'subcategories', 'companies'));

});

//Route::get('/details/{id}' , function ($id) {
//    $categories = Category::all();
//    $subcategories = Subcategory::all();
//    $company = Company::findOrFail($id);
//
//    return view('details' , compact('categories', 'subcategories', 'company'));
//
//});

Route::resource('/details', 'CompanyController');


Route::auth();

Route::group(['middleware'=>'auth'], function (){
    Route::resource('/user', 'UserOrdersController');

});
Route::group(['middleware'=>'admin'], function (){
    Route::resource('/admin/company', 'AdminCompaniesController');
    Route::resource('/admin/company/certificate', 'AdminCertificatesController');

});

//Route::group(['namespace' => 'User', 'prefix' => 'user'], function(){
//    Route::get('{nickname}/settings', ['as' => 'user.settings', 'uses' => 'SettingsController@index']);
//    Route::get('{nickname}/profile', ['as' => 'user.profile', 'uses' => 'ProfileController@index']);
//});
Route::get('/home', 'HomeController@index');
//Route::post('/details/{company}/AddComment', function (Company $company, Request $request){
//
//});

Route::get ( '/search', function () {

    $categories = Category::all();
    $subcategories = Subcategory::all();
    $name = Input::get ( 'name' );

    $companies = Company::query()
        ->where('name', 'LIKE', "%{$name}%")
        ->orWhere('description', 'LIKE', "%{$name}%")
        ->get();
    return view('welcome',compact('categories', 'subcategories', 'companies'));

});

