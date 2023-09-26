<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\MotivoContato;

class principalController extends Controller
{
    public function principal(){
        
         $motivo_contatos = MotivoContato::all();
       
        
        return view('site.index', ['motivo_contatos' => $motivo_contatos, 'titulo' => 'home']);
    }
}
