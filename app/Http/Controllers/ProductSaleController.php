<?php

namespace App\Http\Controllers;

use App\Http\Requests\ProductRequest;
use App\Models\Product;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Log;

class ProductSaleController extends Controller
{
    public function new()
    {
        $product = DB::table('products')->where('del', 0)->get();
        $result_product = json_decode($product, true);
        $client = DB::table('clients')->where('del', 0)->get();
        $client_result = json_decode($client, true);
        return view('sales.new', ['clients'=>$client_result, 'products'=>$result_product]);
    }
}
