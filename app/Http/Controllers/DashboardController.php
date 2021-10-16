<?php

namespace App\Http\Controllers;

use App\Models\products;
use App\Models\purchase;
use App\Models\Sales;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class DashboardController extends Controller
{
    public function dashboardManager(){
        // sum purchase whole
        $sales=Sales::with('products')->get();
        $sumSales=0;
        foreach($sales as $sale){
            $selling_price=$sale->products!=null?$sale->products->selling_price:"0";
            $sumSales+=$selling_price*$sale->quantity;
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

        // Chart For Sales
        $users= Sales::select(DB::raw("COUNT(*) as count"))
        ->whereYear('created_at',date('Y'))
        ->groupBy(DB::raw("Month(created_at)"))
        ->pluck('count');
        $months= Sales::select(DB::raw("Month(created_at) as month"))
                        ->whereYear('created_at',date('Y'))
                        ->groupBy(DB::raw("Month(created_at)"))
                        ->pluck('month');
        $datas= array(0,0,0,0,0,0,0,0,0,0,0,0);
        foreach($months as $index=>$month){
            $datas[$month]=$users[$index];
        }

        // Charts(pie) For Products
        $categories=products::with('getCategory')->get()->groupBy('category_id');
        $dataCategoryWise=[];
        foreach($categories as $category){
            $dataCategoryWiseCount[]=$category->count();
            $dataCategoryWiseName[]=$category[0]->getCategory->name;
        }
        return view('dashboard',compact('sumSales','sumPurchases','sumSalesToday','sumPurchasesToday','datas','dataCategoryWiseCount','dataCategoryWiseName'));
    }
}
