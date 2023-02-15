<?php

namespace App\Http\Controllers;

use App\Models\Administrator;
use Illuminate\Http\Request;
use App\Http\Requests\AdministratorRequest;
use Illuminate\Support\Facades\DB;
class AdministratorController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('administrator.index');
    }

    public function list()
    {
        $administrators = DB::table('administrators')->get();
        $result = json_decode($administrators, true);
        return view('administrador.show', ['administrators'=> $result]);
    }
    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create(AdministratorRequest $request)
    {
        $request->validated();
        $administrador = new Administrator();
        $administrador->nome = request('nome');
        $administrador->cnpj = request('cnpj');
        $administrador->endereco = request('endereco');
        $administrador->telefone = request('telefone');
        $administrador->save();
        return redirect('/lista-clientes')->with('success', "Administrador Registrado");
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
     * @param  \App\Models\Administrador  $administrador
     * @return \Illuminate\Http\Response
     */
    public function show(Administrador $administrador)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Administrador  $administrador
     * @return \Illuminate\Http\Response
     */
    public function edit(Administrador $administrador)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Administrador  $administrador
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Administrador $administrador)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Administrador  $administrador
     * @return \Illuminate\Http\Response
     */
    public function destroy(Administrador $administrador)
    {
        //
    }
}
