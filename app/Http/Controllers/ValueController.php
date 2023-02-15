<?php

namespace App\Http\Controllers;

use App\Http\Requests\EarnRequest;
use App\Models\Earn;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Log;

class ValueController extends Controller
{
    public function sangria()
    {
        $earn = DB::table('earns')->where('del', 0)->get();
        $result = json_decode($earn, true);
        return view('earn.sangria', ['earn'=> $result]);
    }
    public function suprimento()
    {
        $earn = DB::table('earns')->where('del', 0)->get();
        $result = json_decode($earn, true);
        return view('earn.suprimento', ['earn'=> $result]);
    }
    


    public function addSangria()
    {
        $earn = Earn::where('id', '=', '1')->first();
        $earn['atual']-=$_POST['sangria'];
        $earn->save();
        Log::channel('custom')->info('Valor de caixa reduzido. User: '.auth()->user()->name.'.');
        Log::channel('acesso')->info('Valor de caixa reduzido. User: '.auth()->user()->name.'.');
        return redirect('/sales-list')->with('success', "Valor de Caixa Atualizado");
    }

    public function addSuprimento()
    {
        $earn = Earn::where('id', '=', '1')->first();
        $earn['atual']+=$_POST['suprimento'];
        $earn->save();
        Log::channel('custom')->info('Valor de caixa aumentado. User: '.auth()->user()->name.'.');
        return redirect('/sales-list')->with('success', "Valor de Caixa Atualizado");
    }
}
