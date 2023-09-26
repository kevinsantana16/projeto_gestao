<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class ItemDetalhe extends Model
{
      protected $table = 'produto_detalhes'; // Model "ItemDetalhes" associada com tabela "produto_detalhes"

    protected $fillable = ['produto_id', 'comprimento', 'largura', 'altura', 'unidade_id'];

    public function item(){
        return $this->belongsTo(Item::class, 'produto_id', 'id');
    }
}
