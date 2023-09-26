<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;

class Item extends Model
{
    protected $table = 'produtos'; // Model "Item" associada coom tabela "produtos"
    
    protected $fillable = ['nome', 'descricao', 'peso', 'unidade_id', 'fornecedor_id'];

    public function itemdetalhe(){
       
        return $this->hasOne(ItemDetalhe::class, 'produto_id', 'id'); // hasOne() è um metodo especifico para relacionementos um para um na tabela do banco de dados
    }

    public function fornecedor(){
        
        return $this->belongsTo(Fornecedores::class);

    }

    public function pedidos() {
        return $this->belongsToMany('App\Pedido', 'pedidos_produtos', 'produto_id', 'pedido_id'); 
    }
}
