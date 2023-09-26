<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class sobreNosController extends Controller
{
    public function sobrenos(){
        return view('site.sobrenos', ['titulo' => 'sobre-nos']);
    }
}
