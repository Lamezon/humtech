<?php

namespace App\Http\Controllers;

use App\Http\Requests\FaturaRequest;
use App\Models\Fatura;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class Fatura2Controller extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $produtos = DB::table('produtos')->orderBy('nome', 'ASC')->get()->where('del', 0);
        $result = json_decode($produtos, true); 
        $clientes = DB::table('clientes')->get()->where('del', 0);
        $result2 = json_decode($clientes, true);
        return view('fatura.index', ['produtos'=> $result, 'clientes' => $result2]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create(FaturaRequest $request)
    {
        $cliente = DB::table('clientes')->where('id', $_POST['id_cliente'])->first();
        $cliente_nome = $cliente->nome;
        $cliente_email = $cliente->email;
        $cliente_id = $cliente->id;
        $fatura = new Fatura();
        $fatura->nome = $cliente_nome;
        $fatura->id_cliente = $cliente_id;
        $fatura->status = 1;
        $fatura->valor = request('total');
        $fatura->email = $cliente_email;
        $fatura->observacao = request('observacao');     
        $fatura->data_emissao = date("d-m-Y");
        $fatura->descricao = request('descricao');
        $orgDate = request('data_vencimento');
        $newDate = date("d-m-Y", strtotime($orgDate));
        $fatura->data_vencimento = $newDate;
        $fatura->forma_pagamento = request('forma_pagamento');
        $fatura->save();
        return redirect('/lista-fatura')->with('success', "Fatura Registrada");
       
        
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Fatura  $Fatura
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $fatura = DB::table('faturas')->where('id', $id)->first();
        return view('bill.show', ['fatura'=> $fatura]);
    }

    public function emitir($id)
    {
        Fatura::where('id', $id)->update(['status' => 2]);   
        Fatura::where('id', $id)->update(['data_emitido' => date('d-m-Y')]);
        $fatura = DB::table('faturas')->where('id', $id)->first();
        return view('bill.show', ['fatura'=> $fatura]);
    }
    public function cancelar($id)
    {
        Fatura::where('id', $id)->update(['status' => 3]);
        Fatura::where('id', $id)->update(['data_emitido' => "Cancelado"]);
        $fatura = DB::table('faturas')->where('id', $id)->first();
        return view('bill.show', ['fatura'=> $fatura]);
    }
    public function apagar($id)
    {
        Fatura::where('id', $id)->update(['del' => 1]);
        
        $faturas = DB::table('faturas')->get()->where('del', 0);
        $result = json_decode($faturas, true);
        return view('home.index', ['faturas'=> $result]);
    }
    public function print($id)
    {
        $fatura = DB::table('faturas')->where('id', $id)->first();
        $cliente = DB::table('clientes')->where('id', $fatura->id_cliente)->first();
        return view('print.index', ['fatura'=> $fatura, 'cliente'=>$cliente]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Fatura  $Fatura
     * @return \Illuminate\Http\Response
     */
    public function edit(Fatura $Fatura)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Fatura  $Fatura
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Fatura $Fatura)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Fatura  $Fatura
     * @return \Illuminate\Http\Response
     */
    public function destroy(Fatura $Fatura)
    {
        //
    }
}
