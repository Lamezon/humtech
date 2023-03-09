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
        $sale = DB::table('sales')->where('del', 0)->orderBy('id', 'desc')->first();
        if($sale==null){
            $code = 0;
        }else{
            $code = $sale->code;
        }
        $code++;
        if($code>99){
            $code += -99;
        }
        return view('sales.new', ['clients'=>$client_result, 'products'=>$result_product, 'code'=>$code]);
    }
}
