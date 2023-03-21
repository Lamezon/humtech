<?php

namespace App\Http\Controllers;


use App\Models\Product;
use App\Models\Sale;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class ReportController extends Controller
{
    public function index(){
        return view('report.filters');
    }
    public function list(){
        return view('report.list');
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

    public function logout()
    {
        $product = DB::table('products')->where('del', 0)->get();
        $result = json_decode($product, true);
        return view('report.logout', ['products'=> $result]);
    }
    
    public function filter(Request $request)
    {
        $user = DB::table('users')->get();
        $users = json_decode($user, true);
        $query = Sale::query();

        
        $start_date = $request->input('start_date');
        $end_date = $request->input('end_date');
    
        if ($start_date && !$end_date) {
            $query->where('created_at', '>=', $start_date);
        } elseif (!$start_date && $end_date) {
            $query->where('created_at', '<=', $end_date);
        } elseif ($start_date && $end_date) {
            $query->whereBetween('created_at', [$start_date, $end_date]);
        }
        if($request->input('payment')){
            $query->where('payment', '=', $request->input('payment'));
        }


        $sales = $query->get();


        return view('report.index', compact('sales', 'users'));
    }
}
