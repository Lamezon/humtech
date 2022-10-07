<?php

namespace App\Http\Controllers;

use App\Http\Requests\SaleRequest;
use App\Models\Sale;
use App\Models\Product;
use App\Models\Seller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class SaleController extends Controller
{
    public function index()
    {
        $sale = DB::table('sales')->where('del', 0)->get();
        $result_sale = json_decode($sale, true);
        $sellers = DB::table('sellers')->get();
        $result_seller = json_decode($sellers, true);
        $product = DB::table('products')->get();
        $result_product = json_decode($product, true);
        return view('sales.list', ['sale'=> $result_sale, 'seller'=>$result_seller, 'product'=>$result_product]);
    }

    public function new()
    {
        $sellers = DB::table('sellers')->get();
        $result_seller = json_decode($sellers, true);
        $product = DB::table('products')->get();
        $result_product = json_decode($product, true);
        return view('sales.new', ['seller'=>$result_seller, 'product'=>$result_product]);
    }

    public function edit($id)
    {
        $sellers = DB::table('sellers')->get();
        $result_seller = json_decode($sellers, true);
        $product = DB::table('products')->get();
        $result_product = json_decode($product, true);
        $sale = DB::table('sales')->where('id', $id)->first();
        return view('sales.show', ['seller'=>$result_seller, 'product'=>$result_product, 'sale'=>$sale]);
    }

    public function save($id)
    {
        $sale = Sale::where('id', '=', $id)->first();
        $sale['seller_id']=$_POST['seller_id'];
        $sale['product_id']=$_POST['product_id'];
        $sale['quantity']=$_POST['quantity'];
        $sale['total']=$_POST['total'];
        $sale->save();
        return redirect('/sales-list')->with('success', "Venda Atualizada");
    }

    public function register(SaleRequest $request)
    {
        $request->validated();
        $sale = new Sale();
        $sale->seller_id = request('seller_id');
        $sale->product_id = request('product_id');
        $sale->quantity = request('quantity');
        $sale->total = request('total');
        $sale->save();
        return redirect('/sales-list')->with('success', "Venda Registrada");
    }

/* Setting del = 1 (no data lost) */
    public function destroy($id)
    {
        Sale::where('id', $id)->update(['del' => 1]);        
        $sale = DB::table('sales')->where('del', 0)->get();
        $result = json_decode($sale, true);
        return redirect('/sales-list')->with('success', "Venda Removida");
    }
}
