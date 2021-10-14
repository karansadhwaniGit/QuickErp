<?php

namespace App\Http\Controllers;

use App\Http\Requests\SupplierRequest;
use App\Models\Suppliers;
use Illuminate\Http\Request;
use Barryvdh\DomPDF\Facade as PDF;
use Facade\FlareClient\View;

class SuppliersController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $suppliers=Suppliers::with('address')->sortable()->get();
        return view('manage-suppliers',compact('suppliers'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('add-supplier');
    }
    public function createPDF(){
        $data=Suppliers::all();

        // dd(array_column($data[0]));
        $pdf=PDF::loadView('pdf',array('data'=>$data));
        $name=$data[0]->getTable().".pdf";
        return $pdf->download($name);
      }
    public function searchSuppliers(Request $request)
    {
        $request->validate([
            'query'=>'required',
        ]);
        $query=$request->input('query');
        $suppliers=Suppliers::where('last_name','like',"%$query%")->orWhere('first_name','like',"%$query%")->orWhere('gst_no','like',"%$query%")->orWhere('email','like',"%$query%")->orWhere('phone_no','like',"%$query%")->orWhere('company_name','like',"%$query%")->paginate(6);
        return view('manage-suppliers',compact('suppliers'));
    }
    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(SupplierRequest $request)
    {
        Suppliers::create([
            'first_name'=>$request->first_name,
            'last_name'=>$request->last_name,
            'gst_no'=>$request->gst_no,
            'company_name'=>$request->company_name,
            'phone_no'=>$request->phone_no,
            'email'=>$request->email
        ]);
        session()->flash('success',"Supplier Added Successfully!");
        return redirect(route('suppliers.index'));
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Suppliers  $suppliers
     * @return \Illuminate\Http\Response
     */
    public function show(Suppliers $suppliers)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Suppliers  $suppliers
     * @return \Illuminate\Http\Response
     */
    public function edit(Suppliers $suppliers)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Suppliers  $suppliers
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Suppliers $suppliers)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Suppliers  $suppliers
     * @return \Illuminate\Http\Response
     */
    public function destroy(Suppliers $suppliers)
    {
        //
    }
}
