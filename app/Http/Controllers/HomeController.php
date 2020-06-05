<?php

namespace App\Http\Controllers;

use App\Category;
use App\Http\Requests;
use App\Review;
use App\Subcategory;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $categories = Category::all();
        $subcategories = Subcategory::all();

        return view('user.index' , compact('categories', 'subcategories'));
    }
//    public function storeComment(Request $request)
//    {
//        $input = $request->all();
//        $input['user_id'] = Auth::user()->id;
//        Review::create($input);
//        return redirect('details'.$request['company_id']);
//    }

}
