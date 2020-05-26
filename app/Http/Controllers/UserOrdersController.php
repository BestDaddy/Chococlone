<?php

namespace App\Http\Controllers;

use App\Category;
use App\Certificate;
use App\Order;
use App\Subcategory;
use Illuminate\Http\Request;

use App\Http\Requests;
use Illuminate\Support\Facades\Auth;

class UserOrdersController extends Controller
{
//    /**
//     * Create a new controller instance.
//     *
//     * @return void
//     */
//    public function __construct()
//    {
//        $this->middleware('auth');
//    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        $user = Auth::user();
        $categories = Category::all();
        $subcategories = Subcategory::all();
//        $orders = Order::query()
//            ->where('user_id', '=', "%{$user->id}%")
//            ->get();
        $orders = $user->orders;

        return view('user.cart' , compact('categories', 'subcategories', 'orders'));

    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        //test
        //test2
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $input =$request->all();
        $input['count'] = 1;
        $user = Auth::user();

        foreach($user->orders as $order){
            if($order->certificate_id == $input['certificate_id']){
                $order->count =  $order->count + 1;
                $order->save();
                return redirect('user/');
            }
        }

        $user->orders()->create($input);
        $certificate = Certificate::findOrFail($input['certificate_id']);
        if($certificate) {
            $certificate->bought = $certificate->bought + 1;
            $certificate->save();
        }

        return redirect('user/');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
        $order = Order::findOrFail($id);

        $order->delete();
        return redirect('/user');
    }
}
