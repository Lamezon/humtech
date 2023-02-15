<?php

namespace App\Http\Controllers;

use App\Models\Produto;
use Illuminate\Http\Request;
use App\Http\Requests\ProdutoRequest;
use Illuminate\Support\Facades\DB;

class ProdutoController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('product.index');
    }
    public function list()
    {
        $produtos = DB::table('produtos')->get();
        $result = json_decode($produtos, true);
        return view('product.show', ['produtos'=> $result]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create(ProdutoRequest $request)
    {
        $request->validated();
        $product = new Produto();
        $product->nome = request('nome');
        $product->valor = request('valor');
        $product->taxa = request('taxa');
        $product->descricao = request('descricao');
        $product->save();
        return redirect('/lista-fatura')->with('success', "Produto Registrado");
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
     * @param  \App\Models\Produto  $Produto
     * @return \Illuminate\Http\Response
     */
    public function show(Produto $Produto)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Produto  $Produto
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $produto = DB::table('produtos')->where('id', $id)->first();
        return view('product.edit', ['produto'=> $produto]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Produto  $Produto
     * @return \Illuminate\Http\Response
     */
    public function update($id)
    {
       
        $produtos = Produto::where('id', '=', $id)->first();
        $produtos['nome']=$_POST['nome'];
        $produtos['descricao']=$_POST['descricao'];
        $produtos['valor']=$_POST['valor'];
        $produtos['taxa']=$_POST['taxa'];
        $produtos->save();
        return redirect('/lista-produtos')->with('success', "Produto Atualizado");
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Produto  $Produto
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
     /*    var_dump("asd");
        exit();
        $produtos = Produto::where('id', '=', $id)->first();
        $produtos['del']=1;
        $produtos->save(); */
    }
}
