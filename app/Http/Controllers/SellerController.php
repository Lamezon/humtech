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

    public function register(SellerRequest $request)
    {
        $request->validated();
        $seller = new Seller();
        $seller->name = request('name');
        $seller->role = request('role');
        $seller->age = request('age');
        $seller->save();
        return redirect('/sellers-list')->with('success', "Vendedor Registrado");
    }

/* Setting del = 1 (no data lost) */
    public function destroy($id)
    {
        Seller::where('id', $id)->update(['del' => 1]);        
        $sellers = DB::table('sellers')->where('del', 0)->get();
        $result = json_decode($sellers, true);
        return view('seller.list', ['sellers'=> $result]);
    }


}
