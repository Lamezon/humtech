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
    public function sellers(){
        $sellers = DB::table('sellers')->where('del', 0)->orderBy('sales_total', 'desc')->get();
        $result = json_decode($sellers, true);
        return view('report.sellers', ['sellers'=> $result]);
    }
    public function products(){
        $product = DB::table('products')->where('del', 0)->orderBy('profit', 'desc')->get();
        $result = json_decode($product, true);
        return view('report.products', ['products'=> $result]);
    }


}
