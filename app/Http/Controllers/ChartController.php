<?php

namespace App\Http\Controllers;

use App\Models\Sales;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class ChartController extends Controller
{
    //
    public function index()
    {
        $users= Sales::select(DB::raw("COUNT(*) as count"))
                        ->whereYear('created_at',date('Y'))
                        ->groupBy(DB::raw("Month(created_at"))
                        ->pluck('count');
        $months= $users= Sales::select(DB::raw("Month(created_at) as month"))
                            ->whereYear('created_at',date('Y'))
                            ->groupBy(DB::raw("Month(created_at"))
                            ->pluck('Month');
        $datas= array(0,0,0,0,0,0,0,0,0,0,0,0);
        foreach($months as $index=>$month){
            $datas[$month]=$users[$index];
        }
        return view('dashboard',compact('datas'));
    }
}
