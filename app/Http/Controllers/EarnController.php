<?php

namespace App\Http\Controllers;

use App\Http\Requests\EarnRequest;
use App\Models\Earn;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Session;

class EarnController extends Controller
{
    public function index()
    {
        $earn = DB::table('earns')->where('del', 0)->get();
        $result = json_decode($earn, true);
        return view('earn.list', ['earn'=> $result]);
    }


    public function edit()
    {
        $earn = Earn::where('id', '=', '1')->first();
        $earn['total']=$_POST['total'];
        $earn['atual']=$_POST['total'];
        $earn->save();
        Log::channel('custom')->info('Caixa alterado. User: '.auth()->user()->name.'.');
        return redirect('/sales-list')->with('success', "Valor de Caixa Atualizado");
    }
    public function status()
    {
        $earn = DB::table('earns')->where('del', 0)->get();
        $result = json_decode($earn, true);
        return view('earn.status', ['earn'=> $result]);
    }
    public function abrir()
    {
        $earn = Earn::where('id', '=', '1')->first();
        $earn['status']=true;
        $earn->save();
        Session::put('caixa', true);
        Log::channel('custom')->info('Caixa aberto. User: '.auth()->user()->name.'.');
        return redirect('/earn-list')->with('success', "Caixa Aberto com Sucesso");
    }

    public function fechar()
    {
        $earn = Earn::where('id', '=', '1')->first();
        $earn['status']=false;
        $earn->save();
        Session::put('caixa', false);
        Log::channel('custom')->info('Caixa fechaado. User: '.auth()->user()->name.'.');
        return redirect('/sales-list')->with('success', "Caixa Fechado com Sucesso");
    }
}
