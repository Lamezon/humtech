<?php

namespace App\Http\Controllers;

use App\Http\Requests\ClientRequest;
use App\Models\Cliente;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class ClienteController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('client.index');
    }

    public function list()
    {
        $clientes = DB::table('clientes')->get()->where('del', 0);
        $result = json_decode($clientes, true);
        return view('client.show', ['clientes'=> $result]);
    }
    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create(ClientRequest $request)
    {
        $request->validated();
        $client = new Cliente();
        $client->nome = request('nome');
        $client->cpf = request('cpf');
        $client->inscricao = request('inscricao');
        $client->cep = request('cep');
        $client->endereco = request('endereco');
        $client->telefone = request('telefone');
        $client->telefone2 = request('telefone2');
        $client->cidade = request('cidade');
        $client->email = request('email');
        $client->email_secundario = request('email_secundario');
        $client->save();
        return redirect('/lista-clientes')->with('success', "Cliente Registrado");
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
     * @param  \App\Models\Cliente  $cliente
     * @return \Illuminate\Http\Response
     */
    public function show(Cliente $cliente)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Cliente  $cliente
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $cliente = DB::table('clientes')->where('id', $id)->first();
        return view('client.edit', ['cliente'=> $cliente]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Cliente  $cliente
     * @return \Illuminate\Http\Response
     */
    public function update($id)
    {
       
        $clientes = Cliente::where('id', '=', $id)->first();
        $clientes['nome']=$_POST['nome'];
        $clientes['cpf']=$_POST['cpf'];
        $clientes['inscricao']=$_POST['inscricao'];
        $clientes['telefone']=$_POST['telefone'];
        $clientes['telefone2']=$_POST['telefone2'];
        $clientes['cep']=$_POST['cep'];
        $clientes['endereco']=$_POST['endereco'];
        $clientes['cidade']=$_POST['cidade'];
        $clientes['email']=$_POST['email'];
        $clientes['email_secundario']=$_POST['email_secundario'];
        $clientes->save();
        return redirect('/lista-clientes')->with('success', "Cliente Atualizado");
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Cliente  $cliente
     * @return \Illuminate\Http\Response
     */
    public function apagar($id)
    {
        Cliente::where('id', $id)->update(['del' => 1]);
        
        $clientes = DB::table('clientes')->get()->where('del', 0);
        $result = json_decode($clientes, true);
        return view('client.show', ['clientes'=> $result]);
    }
    public function destroy(Cliente $cliente)
    {
        //
    }
}
