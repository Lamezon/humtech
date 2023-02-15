<?php

namespace App\Http\Controllers;


use App\Models\Product;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class ReportController extends Controller
{
    public function index()
    {
        $product = DB::table('products')->where('del', 0)->get();
        $result = json_decode($product, true);
        return view('report.index', ['products'=> $result]);
    }
}
