<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class ExcelController extends Controller
{
    public function index() 
    {
    }
    public function product(){
        $produtos = DB::table('produtos')->get();
        $result = json_decode($produtos, true);
        return view('excel.product', ['produtos'=> $result]);
    }
    public function client(){
        $clientes = DB::table('clientes')->get();
        $result = json_decode($clientes, true);
        return view('excel.client', ['clientes' => $result]);
    }
    public function bill(){
        $faturas = DB::table('faturas')->get();
        $result = json_decode($faturas, true);
        return view('excel.bill', ['faturas'=>$result]);
    }
}
