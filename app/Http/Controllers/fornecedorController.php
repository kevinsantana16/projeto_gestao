<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use \App\Fornecedores;

class fornecedorController extends Controller
{
    public function index(){
        return view('app.fornecedor.index', ['titulo' => 'Fornecedor']);
}

    public function listar(Request $request){
      
        $fornecedores = Fornecedores::with('items')->where('nome', 'like', '%'.$request->input('nome').'%')
                       ->where('site', 'like', '%'.$request->input('site').'%')
                       ->where('uf', 'like', '%'.$request->input('uf').'%')
                       ->where('email', 'like', '%'.$request->input('email').'%')
                       ->paginate(5);
       return view('app.fornecedor.listar', ['titulo' => 'Fornecedor - lista', 'fornecedores' => $fornecedores, 'request' => $request->all()]);
    }

    public function adicionar(Request $request){
       
       $msg = '';
     
            
             
            // inclusao de dados no bacos da dados    
            if( $request->get('_token') != '' && empty($request->get('id'))){

                $regras = [
                    'nome' => 'min:3|max:40',
                    'site' => 'required',
                    'uf' => 'min:2|Max:2',
                    'email' => 'email',
                ];

                $feedback = [
                    'required' => 'O campo :attribute deve ser preenchido',
                    'email' => 'O email informado nao e valido',
                    
                    'min' => 'O campo :attribute deve ter pelo menos 3 letras',
                    'max' => 'O campo :atribute deve ter pelo menos 40 letras',
                    
                    'uf.min' => 'O campo :attribute deve ter pelo menos 2 letras',
                    'uf.max' => 'O campo :attribute deve ter pelo menos 2 letras',
                ];

                
                $request->validate($regras, $feedback);

                $fornecedor = new Fornecedores();
                
                $fornecedor->create($request->all());

                $msg = 'Cadastro realizado com sucesso !!';

            }
            
            
            // Edicao de um registro no banco de dados 
            if( $request->get('_token') != '' && $request->get('id') != ''){
                
                $fornecedor_editar = Fornecedores::find( $request->get('id'));
                $update = $fornecedor_editar->update($request->all());

                if($update){
                    $msg = 'Registro atualizado com sucesso';
                }
                else{
                    $msg = 'Falha na atualizacao';
                }
                 
                
                return redirect()->route('app.fornecedor.editar', ['id' =>  $request->get('id'), 'msg' => $msg]);
            }

               
       
        return view('app.fornecedor.adicionar', ['titulo' => 'Fornecedor - Adicionar', 'msg' => $msg]);
    }

    public function editar($id, $msg = ''){
         
         $fornecedor_editar = Fornecedores::find($id);

         return view('app.fornecedor.adicionar', ['titulo' => 'Fornecedor - Editar', 'fornecedor_editar' => $fornecedor_editar, 'msg' => $msg]);
    }
    
    public function excluir($id){
           $fornecedores_delete = Fornecedores::find($id)->delete();
            $msg = '';
            
            if($fornecedores_delete){
                $msg = 'Registro excluido com sucesso';
            } 
            else{
                $msg = 'Erro na exclusao do registro ';
            }
            return redirect()->route('app.fornecedor');
    }

}