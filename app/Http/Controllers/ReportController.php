<?php

namespace App\Http\Controllers;


use App\Models\Product;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class ReportController extends Controller
{
    public function list(){
        return view('report.list');
    }
    public function index()
    {
        $product = DB::table('products')->where('del', 0)->get();
        $result = json_decode($product, true);
        return view('report.index', ['products'=> $result]);
    }

    public function products()
    {
        $product = DB::table('products')->where('del', 0)->get();
        $result = json_decode($product, true);
        return view('report.products', ['products'=> $result]);
    }

    public function clients()
    {
        $client = DB::table('clients')->where('del', 0)->get();
        $result = json_decode($client, true);
        return view('report.clients', ['clients'=> $result]);
    }
}
