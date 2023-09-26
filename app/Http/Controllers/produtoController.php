<?php

namespace App\Http\Controllers;

use App\Unidade;
use App\Produto;
use App\Item;
use App\Fornecedores;
use Illuminate\Http\Request;

class ProdutoController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        
        $produtos = Item::with(['itemdetalhe', 'fornecedor'])->paginate(10); // Item::with([''])->  Metodo eager loading
       
       return view('app.produto.index', ['titulo' => 'Produtos - lista', 'produtos' => $produtos,'request' => $request->all()]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $unidades = Unidade::all();
        $fornecedores = Fornecedores::all();
        
        return  view('app.produto.create', ['unidades' => $unidades, 'fornecedores' => $fornecedores]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {

         $regras = [
            'nome' => 'required|min:3|max:40',
            'descricao' => 'required|min:3|max:2000',
            'peso' => 'required|integer',
            'unidade_id' => 'exists:unidades,id', // exists:tabela,coluna
            'fornecedor_id' => 'exists:fornecedores,id', // exists
        ];

        $feedback = [
            'required' => 'O campo :attribute deve ser preenchido',
            'min' => 'O campo :attribute deve ter pelo menos 3 letras',
            'integer' => 'O campo :attribute deve ser um numero inteiro',
            
            'unidade_id.exists' => ' A unidade de medida informada nao existe',
            'fornecedor_id.exists' => ' A fornecedor informado nao existe',
            'nome.max' => 'O campo :atribute deve ter pelo menos 40 letras',
            'descricao.max' => 'O campo :atribute deve ter pelo menos 2000 letras',
        ];

    
    $request->validate($regras, $feedback);
    
    
    Item::create($request->all());
    
    return redirect()->route('produto.index');



    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Produto  $produto
     * @return \Illuminate\Http\Response
     */
    public function show(Produto $produto)
    {
        
        return  view('app.produto.show', ['produto' => $produto]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Item  $produto
     * @return \Illuminate\Http\Response
     */
    public function edit(Produto $produto)
    {
       $unidades = Unidade::all();
       $fornecedores = Fornecedores::all();
        return view('app.produto.edit', ['produto' => $produto, 'unidades' => $unidades,  'fornecedores' => $fornecedores]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Item  $produto
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Item $produto)
    {
       
       
         $regras = [
            'nome' => 'required|min:3|max:40',
            'descricao' => 'required|min:3|max:2000',
            'peso' => 'required|integer',
            'unidade_id' => 'exists:unidades,id', // exists:tabela,coluna
            'fornecedor_id' => 'exists:fornecedores,id', // exists
        ];

        $feedback = [
            'required' => 'O campo :attribute deve ser preenchido',
            'min' => 'O campo :attribute deve ter pelo menos 3 letras',
            'integer' => 'O campo :attribute deve ser um numero inteiro',
            
            'unidade_id.exists' => ' A unidade de medida informada nao existe',
            'fornecedor_id.exists' => ' A fornecedor informado nao existe',
            'nome.max' => 'O campo :atribute deve ter pelo menos 40 letras',
            'descricao.max' => 'O campo :atribute deve ter pelo menos 2000 letras',
        ];

       
        $request->validate($regras, $feedback);
        $produto->update($request->all());
        
         return redirect()->route('produto.show', ['produto' => $produto]);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Produto  $produto
     * @return \Illuminate\Http\Response
     */
    public function destroy(Produto $produto)
    {
        $produto->delete();

        return redirect()->route('produto.index');
    }
}
