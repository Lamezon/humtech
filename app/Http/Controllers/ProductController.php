<?php

namespace App\Http\Controllers;

use App\Http\Requests\ProductRequest;
use App\Models\Product;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class ProductController extends Controller
{
    public function index()
    {
        $product = DB::table('products')->where('del', 0)->get();
        $result = json_decode($product, true);
        return view('product.list', ['product'=> $result]);
    }

    public function new()
    {
        return view('product.new');
    }

    public function edit($id)
    {
        $product = DB::table('products')->where('id', $id)->first();
        return view('product.show', ['product'=> $product]);
    }

    public function save($id)
    {
        $product = Product::where('id', '=', $id)->first();
        $product['name']=$_POST['name'];
        $product['price']=$_POST['price'];
        $product['sold_amount']=$_POST['sold_amount'];
        $product->save();
        return redirect('/products-list')->with('success', "Produto Atualizado");
    }

    public function register(ProductRequest $request)
    {
        $request->validated();
        $product = new Product();
        $product->name = request('name');
        $product->price = request('price');
        $product->sold_amount = request('sold_amount');
        $product->save();
        return redirect('/products-list')->with('success', "Produto Criado");
    }

/* Setting del = 1 (no data lost) */
    public function destroy($id)
    {
        Product::where('id', $id)->update(['del' => 1]);        
        $product = DB::table('products')->where('del', 0)->get();
        $result = json_decode($product, true);
        return redirect('/products-list')->with('success', "Produto Removido");
    }
}
