<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class HomeController extends Controller
{
    public function index() 
    {
        $faturas = DB::table('faturas')->get()->where('del', 0);
        $result = json_decode($faturas, true);
        return view('home.index', ['faturas'=> $result]);
    }
}
