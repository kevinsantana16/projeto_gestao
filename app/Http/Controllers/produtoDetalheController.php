<?php

namespace App\Http\Controllers;

use App\ItemDetalhe;
use App\ProdutoDetalhe;
use Illuminate\Http\Request;
use App\Unidade;
use App\Fornecedores;




class produtoDetalheController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $unidades = Unidade::all();
        $ProdutoDetalhe = ItemDetalhe::with(['item']);  // Item::with([''])->  Metedo eager loading
       
        return view('app.produto_detalhe.create',[ 'unidades' => $unidades, 'ProdutoDetalhe' => $ProdutoDetalhe]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        ItemDetalhe::create($request->all());
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param Interger $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
       $ProdutoDetalhe = ItemDetalhe::with(['item'])->find($id);  // Item::with([''])->  Metedo eager loading
       $unidades = Unidade::all();
       $fornecedores = Fornecedores::all();
      
       return view('app.produto_detalhe.edit', ['ProdutoDetalhe' => $ProdutoDetalhe , 'unidades' => $unidades, 'fornecedores' => $fornecedores]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param   App\ProdutoDetalhe $ProdutoDetalhe
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, ProdutoDetalhe $ProdutoDetalhe)
    {
        $ProdutoDetalhe->update($request->all());
        echo 'Atualizacao realizada com sucesso';
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
