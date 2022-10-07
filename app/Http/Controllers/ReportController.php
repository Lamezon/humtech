<?php

namespace App\Http\Controllers;


use App\Models\Product;
use App\Models\Sale;
use App\Models\Seller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class ReportController extends Controller
{
    public function index()
    {
        return view('report.index');
    }
    public function products(){
        $sellers = DB::table('sales')
        ->orderBy('seller_id', 'asc')
        ->get()
        ->groupBy('seller_id');

        print($sellers);
    }

}
