<?php

namespace App\Http\Controllers;

use App\Models\purchase;
use App\Models\Sales;
use Illuminate\Http\Request;

class DashboardController extends Controller
{
    public function dashboardManager(){
        // sum purchase whole
        $sales=Sales::with('products')->get();
        $sumSales=0;
        foreach($sales as $sale){
            $sumSales+=$sale->products->selling_price*$sale->quantity;
        }
        // sum purchase whole
        $purchases=purchase::all();
        $sumPurchases=0;
        foreach($purchases as $purchase){
            $sumPurchases+=$purchase->quantity*$purchase->purchase_rate;
        }
        //sale today
        $salesToday=Sales::whereDate('created_at',date('Y-m-d'))->with('products')->get();
        $sumSalesToday=0;
        foreach($salesToday as $saleToday){
            $sumSalesToday+=$saleToday->products->selling_price*$saleToday->quantity;
        }
        //purchase today
        $purchasesToday=purchase::whereDate('created_at',date('Y-m-d'))->get();
        $sumPurchasesToday=0;
        foreach($purchasesToday as $purchaseToday){
            $sumPurchasesToday+=$purchase->quantity*$purchase->purchase_rate;
        }
        return view('dashboard',compact('sumSales','sumPurchases','sumSalesToday','sumPurchasesToday'));
    }
}
