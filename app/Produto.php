<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Produto extends Model
{
    protected $fillable = ['nome', 'descricao', 'peso', 'unidade_id'];

    public function ProdutoDetalhe(){
       
        return $this->hasOne(ProdutoDetalhe::class); // hasOne() è um metodo especifico para relacionementos um para um na tabela do banco de dados
    }
}

