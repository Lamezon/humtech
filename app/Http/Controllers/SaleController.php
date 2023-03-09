<?php

namespace App\Http\Controllers;

use App\Http\Requests\SaleRequest;
use App\Models\Sale;
use App\Models\User;
use App\Models\Earn;
use App\Models\Client;
use App\Models\Product;
use App\Models\SalesProduct;
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
        $users = DB::table('users')->get();
        $result_users = json_decode($users, true);
        $cash = DB::table('earns')->where('id', 1)->get();
        $total = json_decode($cash, true);
        return view('sales.list', ['sale'=> $result_sale, 'users'=>$result_users, 'total' => $total]);
    }

    public function view($id)
    {
        $sale = DB::table('sales')->where('id', $id)->first();
        $sale_description = DB::table('sales_products')->where('sale_id', $sale->id)->get();
        $sale_desc = json_decode($sale_description, true);
        $valores = explode(", ", $sale_desc[0]['products_code']);
        $contagem = array_count_values($valores);
       
        $prod_codes = ($sale_desc[0]['products_code']);
        $codes = explode(',', $prod_codes);
        $product = DB::table('products')->where('del', 0)->get();
        $result_product = json_decode($product, true);
        return view('sales.show', ['sale'=> $sale, 'codes'=>$codes, 'products'=>$result_product]);
    }


    public function print($id)
    {
        $sale = DB::table('sales')->where('id', $id)->first();
        $sale_description = DB::table('sales_products')->where('sale_id', $sale->id)->get();
        $sale_desc = json_decode($sale_description, true);
        $valores = explode(", ", $sale_desc[0]['products_code']);
        $contagem = array_count_values($valores);
        $prod_codes = ($sale_desc[0]['products_code']);
        $codes = explode(',', $prod_codes);
        $product = DB::table('products')->where('del', 0)->get();
        $result_product = json_decode($product, true);
        return view('sales.print', ['sale'=> $sale, 'codes'=>$codes, 'products'=>$result_product]);
    }

    public function new()
    {
        $sellers = DB::table('sellers')->where('del', 0)->get();
        $result_seller = json_decode($sellers, true);
        $product = DB::table('products')->where('del', 0)->get();
        $result_product = json_decode($product, true);
        $clients = DB::table('clients')->where('del', 0)->get();
        $result_clients = json_decode($clients, true);
        $sale = DB::table('sales')->last();
        $result_sale = json_decode($sale, true);
        var_dump($result_sale);
        return view('sales.new', ['seller'=>$result_seller, 'product'=>$result_product, 'client'=>$result_clients]);
    }


    public function register(Request $request)
    {
        $name = request('seller_name');
        $seller = User::where('name', '=', $name)->first();
        $sale = new Sale();
        $sale->code = $request['sale_code'];
        $sale->seller_id = $seller['id'];
        $sale->payment = $request['payment'];
        $sale->client_id = $request['client_id'];
        $total = doubleval(str_replace(',', '.', request('total-sell')));
        $sale->total = $total;

        $earn = Earn::where('id', '=', '1')->first();
        $earn['atual']+=$total;
        $earn->save();
      
        $sale->save();
        $client = Client::where('id', '=', ($request['client_id']))->first();
        $client['total']+=$total;
        $client['times']+=1;
        $client->save();
        
        $prod_desc = new SalesProduct();
        $prod_desc->sale_id = $sale->id;

        $prod_desc->products_code = $request['ids-products'];
        $prod_desc->save();

        $sale_description = DB::table('sales_products')->where('sale_id', $sale->id)->get();
        $sale_desc = json_decode($sale_description, true);
        $valores = explode(",", $sale_desc[0]['products_code']);
        foreach ($valores as &$valor) {
            DB::table('products')->whereId((int)($valor))->increment('sold_amount', 1);
            DB::table('products')->whereId((int)($valor))->increment('sold_amount_access', 1);
        }
      
        Log::channel('custom')->info('Caixa alterado. User: '.auth()->user()->name.'.');
      
        return redirect('/sales-list')->with('success', "Venda Registrada")->with('newtab', $sale->id);
    }

/* Setting del = 1 (no data lost) */
    public function destroy($id)
    {
        Sale::where('id', $id)->update(['del' => 1]);
      
        Log::channel('custom')->info('Venda de ID = '.$id.' deletada por '.auth()->user()->name.'.');
        return redirect('/sales-list')->with('success', "Venda Removida");
    }
}
