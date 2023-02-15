<?php

namespace App\Http\Controllers;

use App\Http\Requests\ClientRequest;
use App\Models\Client;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Log;

class ClientController extends Controller
{
    public function index()
    {
        $clients = DB::table('clients')->where('del', 0)->get();
        $result = json_decode($clients, true);
        return view('client.list', ['clients'=> $result]);
    }

    public function new()
    {
        return view('client.new');
    }

    public function edit($id)
    {
        $client = DB::table('clients')->where('id', $id)->first();
        return view('client.show', ['client'=> $client]);
    }

    public function save($id)
    {
        $client = Client::where('id', '=', $id)->first();
        $client['name']=$_POST['name'];
        $client['cpf']=$_POST['cpf'];
        $client['phone']=$_POST['phone'];
        $client->save();
        Log::channel('custom')->info('Cliente de ID = '.$client['id'].' alterado por '.auth()->user()->name.'.');
        return redirect('/clients-list')->with('success', "Registro Atualizado");
    }

    public function register(ClientRequest $request)
    {
        $request->validated();
        $client = new Client();
        $client->name = request('name');
        $client->cpf = request('cpf');
        $client->phone = request('phone');
        $client->save();
        Log::channel('custom')->info('Cliente de ID = '.$client['id'].' criado por '.auth()->user()->name.'.');
        return redirect('/clients-list')->with('success', "Registro Criado");
    }

/* Setting del = 1 (no data lost) */
    public function destroy($id)
    {
        Client::where('id', $id)->update(['del' => 1]);        
        Log::channel('custom')->info('Cliente de ID = '.$id.' deletado por '.auth()->user()->name.'.');
        return redirect('/clients-list')->with('success', "Registro Removido");
    }
}
