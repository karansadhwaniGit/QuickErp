<?php

namespace App\Http\Controllers;

use App\Models\Categories;
use App\Models\products;
use App\Models\Suppliers;
use Illuminate\Http\Request;
use Barryvdh\DomPDF\Facade as PDF;


class ProductsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $products=Products::with('getCategory','suppliers')->get();
        // dd($products);
        return view('manage-products',compact('products'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $categories=Categories::paginate(10);
        $suppliers=Suppliers::paginate(10);
        return view('add-product',compact('categories','suppliers'));
    }
    public function createPDF(){
        $data=products::all();

        // dd(array_column($data[0]));
        $pdf=PDF::loadView('pdf',array('data'=>$data));
        $name=$data[0]->getTable().".pdf";
        return $pdf->download($name);
      }
      public function searchProducts(Request $request)
      {
          $request->validate([
              'query'=>'required',
          ]);
          $query=$request->input('query');
          $products=products::where('product_name','like',"%$query%")->orWhere('specification','like',"%$query%")->orWhere('hsn','like',"%$query%")->orWhere('selling_price','like',"%$query%")->orWhere('eoq','like',"%$query%")->orWhere('danger_level','like',"%$query%")->paginate(6);
          return view('manage-products',compact('products'));
      }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        // dd($request->suppliers);
        products::create([
            'product_name'=>$request->product_name,
            'specification'=>$request->specification,
            'hsn'=>$request->hsn,
            'supplier_id'=>$request->suppliers,
            'category_id'=>$request->category,
            'selling_price'=>$request->selling_price,
            'eoq'=>$request->eoq,
            'danger_level'=>$request->danger_level
        ]);
        session()->flash('success','Product Added Successfully!');
        return redirect(route('products.index'));
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\products  $products
     * @return \Illuminate\Http\Response
     */
    public function show(products $products)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\products  $products
     * @return \Illuminate\Http\Response
     */
    public function edit(products $products)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\products  $products
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, products $products)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\products  $products
     * @return \Illuminate\Http\Response
     */
    public function destroy(products $products)
    {
        //
    }
}
