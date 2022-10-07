<?php

namespace App\Http\Controllers;

use App\Http\Requests\SaleRequest;
use App\Models\Sale;
use App\Models\Product;
use App\Models\Seller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Log;

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
        $sellers = DB::table('sellers')->where('del', 0)->get();
        $result_seller = json_decode($sellers, true);
        $product = DB::table('products')->where('del', 0)->get();
        $result_product = json_decode($product, true);
        return view('sales.new', ['seller'=>$result_seller, 'product'=>$result_product]);
    }

    public function edit($id)
    {
        $sellers = DB::table('sellers')->where('del', 0)->get();
        $result_seller = json_decode($sellers, true);
        $product = DB::table('products')->where('del', 0)->get();
        $result_product = json_decode($product, true);
        $sale = DB::table('sales')->where('id', $id)->first();
        return view('sales.show', ['seller'=>$result_seller, 'product'=>$result_product, 'sale'=>$sale]);
    }

    public function save($id)
    {
        $sale = Sale::where('id', '=', $id)->first();
        $sale['seller_id']=$_POST['seller_id'];
        $sale['product_id']=$_POST['product_id'];
        $old_sale_quantity=$sale['quantity'];
        $sale['quantity']=$_POST['quantity'];
        $old_sale_total=$sale['total'];
        $sale['total']=$_POST['total'];
        $sale->save();
        $total_value = ((int)$_POST['total']);
        $quantity_value = ((int)$_POST['quantity']);
        /* DataBase updates */
        DB::table('sellers')->whereId($_POST['seller_id'])->decrement('sales_total', (int)$old_sale_total);
        DB::table('sellers')->whereId($_POST['seller_id'])->increment('sales_total', $total_value);
        DB::table('sellers')->whereId($_POST['seller_id'])->decrement('sales_quantity', (int)$old_sale_quantity);
        DB::table('sellers')->whereId($_POST['seller_id'])->increment('sales_quantity', $quantity_value);

        DB::table('products')->whereId($_POST['product_id'])->decrement('profit', (int)$old_sale_total);
        DB::table('products')->whereId($_POST['product_id'])->increment('profit', $total_value);
        DB::table('products')->whereId($_POST['product_id'])->decrement('sold_amount', (int)$old_sale_quantity);
        DB::table('products')->whereId($_POST['product_id'])->increment('sold_amount', $quantity_value);
        
        
        Log::channel('custom')->info('Venda de ID = '.$sale['id'].' alterada por '.auth()->user()->name.'.');
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
        $total_value = ((int)request('total'));
        $quantity_value = ((int)request('quantity'));
        DB::table('sellers')->whereId(request('seller_id'))->increment('sales_total', $total_value);
        DB::table('sellers')->whereId(request('seller_id'))->increment('sales_quantity', 1);
        DB::table('products')->whereId(request('product_id'))->increment('profit', $total_value);
        DB::table('products')->whereId(request('product_id'))->increment('sold_amount', $quantity_value);
        Log::channel('custom')->info('Venda de ID = '.$sale['id'].' criada por '.auth()->user()->name.'.');
        return redirect('/sales-list')->with('success', "Venda Registrada");
    }

/* Setting del = 1 (no data lost) */
    public function destroy($id)
    {
        Sale::where('id', $id)->update(['del' => 1]);      
        Log::channel('custom')->info('Venda de ID = '.$id.' deletada por '.auth()->user()->name.'.');
        return redirect('/sales-list')->with('success', "Venda Removida");
    }
}
