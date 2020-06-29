<?php

namespace App\Http\Controllers;

use App\Category;
use App\Certificate;
use App\Company;
use App\Subcategory;
use Illuminate\Http\Request;

use App\Http\Requests;

class AdminCompaniesController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
//        $categories = Category::all();
//        $subcategories = Subcategory::all();
        $companies = Company::all();
//        return view('admin.company.index',compact('categories', 'subcategories', 'companies'));
        return view('admin.company.index',compact( 'companies'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        $categories = Category::all()->pluck('name', 'id');
//        $subcategories = Subcategory::lists('name', 'id')->all();
        $subcategories = Subcategory::all();

        return view('admin.company.create',compact( 'categories','subcategories'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
        $company = Company::create($request->all());
        return redirect('admin/company/'. $company->id);

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
        $company = Company::findOrFail($id);
        return view('admin.company.show',compact( 'company'));

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
        $categories = Category::all()->pluck('name', 'id');
        $company = Company::findOrFail($id);
        return view('admin.company.edit',compact( 'company', 'categories'));
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
        $company = Company::findOrFail($id);
        $company->update($request->all());
        return redirect('admin/company/'.$company->id);
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
        Company::findOrFail($id)->delete();
        return redirect('admin/company');
    }




}
