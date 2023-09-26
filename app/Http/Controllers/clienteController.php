<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Cliente;

class clienteController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
          $clientes = Cliente::paginate(10);
          
          return view('app.cliente.index', ['clientes' => $clientes, 'request' => $request->all()]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
          return view('app.cliente.create');
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
        ];

        $feedback = [
            'required' => 'O campo :attribute deve ser preenchido',
            'min' => 'O campo :attribute deve ter pelo menos 3 letras',
             'nome.max' => 'O campo :atribute deve ter pelo menos 40 letras',
          ];

    
    $request->validate($regras, $feedback);
    
    
    Cliente::create($request->all());
    
    return redirect()->route('cliente.index');
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
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        return view('app.cliente.edit');
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Cliente $cliente )
    {
         
         $regras = [
            'nome' => 'required|min:3|max:40',
        ];

        $feedback = [
            'required' => 'O campo :attribute deve ser preenchido',
            'min' => 'O campo :attribute deve ter pelo menos 3 letras',
             'nome.max' => 'O campo :atribute deve ter pelo menos 40 letras',
          ];

    
    $request->validate($regras, $feedback);
    $cliente->update($request->all());
    
    return redirect()->route('cliente.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param $Cliente
     * @return \Illuminate\Http\Response
     */
    public function destroy( Cliente $cliente)
    {
        $cliente->delete();

        return redirect()->route('cliente.index');
    }
}
