<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;
use Illuminate\Session\Middleware\StartSession;

class loginController extends Controller
{
    function index(Request $request){
        
        $erro = '';
        
        if($request->get('erro') == 1){
            $erro = 'usuario ou senha nao existe';
        }

        if($request->get('erro') == 2){
            $erro = 'necessario o login';
        }
        
        return view('site.login', ['titulo' => 'login', 'erro' => $erro]);
    }
    
    function autenticar(Request $request){
       
       $regras = [
        'usuario' => 'email',
        'senha' => 'required'
       ];

       $feedback = [
        'usuario.email' => 'o campo (email) obrigatorio',
        'senha.required' => 'o campo (senha) obrigatorio',
       ];

       $request->validate($regras, $feedback);

       $email_input = $request->get('usuario');
       $password_input = $request->get('senha');

       $user = new User();

       $usuario = $user->where('email', $email_input)
                    ->where('password', $password_input)
                    ->get()
                    ->first();
    
    if(isset($usuario->name)){
     
      session_start();
      $_SESSION['name'] = $usuario->name;
      $_SESSION['email'] = $usuario->email;

      return redirect()->route('app.home');

    }
    else{
        return redirect()->route('site.login', ['erro' => 1]);
    }

   
       
 }
 
    public function sair(){
        session_destroy();
        return redirect()->route('site.index');
    }

    
}
