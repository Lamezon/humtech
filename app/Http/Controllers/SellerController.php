<?php

namespace App\Http\Controllers;

use App\Http\Requests\SellerRequest;
use App\Models\Seller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class SellerController extends Controller
{
    public function index()
    {
        $sellers = DB::table('sellers')->where('del', 0)->get();
        $result = json_decode($sellers, true);
        return view('seller.list', ['sellers'=> $result]);
    }

    public function new()
    {
        return view('seller.new');
    }

    public function edit($id)
    {
        $seller = DB::table('sellers')->where('id', $id)->first();
        return view('seller.show', ['seller'=> $seller]);
    }

    public function save($id)
    {
        $seller = Seller::where('id', '=', $id)->first();
        $seller['name']=$_POST['name'];
        $seller['role']=$_POST['role'];
        $seller['age']=$_POST['age'];
        $seller->save();
        return redirect('/sellers-list')->with('success', "Registro Atualizado");
    }

    public function register(SellerRequest $request)
    {
        $request->validated();
        $seller = new Seller();
        $seller->name = request('name');
        $seller->role = request('role');
        $seller->age = request('age');
        $seller->save();
        return redirect('/sellers-list')->with('success', "Registro Criado");
    }

/* Setting del = 1 (no data lost) */
    public function destroy($id)
    {
        Seller::where('id', $id)->update(['del' => 1]);        
        $sellers = DB::table('sellers')->where('del', 0)->get();
        $result = json_decode($sellers, true);
        return redirect('/sellers-list')->with('success', "Registro Removido");
    }
}
