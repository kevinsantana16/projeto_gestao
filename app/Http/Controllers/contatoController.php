<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\SiteContato;
use \App\MotivoContato;

class contatoController extends Controller

{
    public function contato(){
       
       /* metodo 1 - gravando dados do formulario
       $contato = new SiteContato();
       $contato->nome = $request->input('nome');
       $contato->telefone = $request->input('telefone');
       $contato->email = $request->input('email');
       $contato->motivo_contato = $request->input('motivo_contato');
       $contato->mensagem = $request->input('mensagem');
       $contato->save();
       */ 
       
       /* metodo 2 - gravando dados do formulario
       $contato = new SiteContato();
       $contato->fill($request->all());
       $contato->save();
       */
       
        /* metodo 3 - gravando dados do formulario
       $contato = new SiteContato();
       $contato->create($request->all());
       $contato->save();
       */
       
       $motivo_contatos = MotivoContato::all();
       
       return view("site.contato", ['motivo_contatos' => $motivo_contatos, 'titulo' => 'contato']);
    }

    public function salvar(Request $request){
          
          $regras = [
               'nome' => 'required|min:3|max:40',
               'telefone' => 'required',
               'email' => 'email',
               'motivo_contato_id' => 'required',
               'mensagem' => 'required|max:2000'

          ];

          $feedback = [
              
              'required' => 'O campo :attribute deve ser preenchido',
              'email' => 'O email informado nao e valido',
              'min' => 'O campo :atribute deve ter pelo menos 3 letras',
              
              'nome.max' => 'O campo :attribute deve ter no maximo 40 letras',
              'motivo_contato_id' => 'O campo contato deve ser preenchido',
              'mensagem.max' => 'O campo :attribute deve ter no maximo 2000 letras'
            ];
          
          $request->validate( $regras, $feedback );

          SiteContato::create($request->all());
          return redirect()->route('site.index');
    }
}
