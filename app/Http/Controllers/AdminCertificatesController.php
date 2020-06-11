<?php

namespace App\Http\Controllers;

use App\Certificate;
use App\Company;
use App\Order;
use Illuminate\Http\Request;

use App\Http\Requests;

class AdminCertificatesController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
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
        $input = $request->all();
        $input['bought'] = 0;

        Certificate::create($input);
        return redirect('/admin/company/'.$input['company_id']);
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
        $certificate = Certificate::findOrFail($id);
        $company = $certificate->company;

        return view('admin.company.editCertificate',compact( 'company', 'certificate'));
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
        $certificate = Certificate::findOrFail($id);
        $certificate->update($request->all());
        return redirect('admin/company/'.$certificate->company_id);
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
        $certificate = Certificate::findOrFail($id);
        foreach (Order::query()->where('certificate_id', '=', "{$id}")->get() as $order){
            $order->delete();
        }
        $company_id = $certificate->company_id;
        $certificate->delete();
        return redirect('/admin/company/'.$company_id);
    }


}
