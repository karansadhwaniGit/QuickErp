<?php

namespace App\Http\Controllers;

use App\Http\Requests\CustomerRequest;
use App\Models\customers;
use Illuminate\Http\Request;
use Barryvdh\DomPDF\Facade as PDF;

class CustomersController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $customers=Customers::sortable()->paginate(10);
        return view('manage-customers',compact('customers'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        return view('add-customer');
    }
    public function createPDF(){
        $data=customers::all();

        // dd(array_column($data[0]));
        $pdf=PDF::loadView('pdf',array('data'=>$data));
        $name=$data[0]->getTable().".pdf";
        return $pdf->download($name);
    }
    public function searchCustomers(Request $request)
    {
        $request->validate([
            'query'=>'required',
        ]);
        $query=$request->input('query');
        $customers=Customers::where('first_name','like',"%$query%")->orWhere('last_name','like',"%$query%")->orWhere('phone_no','like',"%$query%")->orWhere('gst_no','like',"%$query%")->orWhere('email','like',"%$query%")->paginate(6);
        return view('manage-customers',compact('customers'));

    }
    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(CustomerRequest $request)
    {
        Customers::create([
            'first_name'=>$request->first_name,
            'last_name'=>$request->last_name,
            'gst_no'=>$request->gst_no,
            'phone_no'=>$request->phone_no,
            'email'=>$request->email
        ]);
        session()->flash('success',"Customer Added Successfully!");
        return redirect(route('customers.index'));
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\customers  $customers
     * @return \Illuminate\Http\Response
     */
    public function show(customers $customers)
    {
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\customers  $customers
     * @return \Illuminate\Http\Response
     */
    public function edit(customers $customers)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\customers  $customers
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, customers $customers)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\customers  $customers
     * @return \Illuminate\Http\Response
     */
    public function destroy(customers $customers)
    {
        //
    }
}
