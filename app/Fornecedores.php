<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Fornecedores extends Model
{ 
    use SoftDeletes;
   
    protected $table = 'fornecedores';
    protected $fillable = ['nome', 'site', 'uf', 'email'];

     public function items(){
        return $this->hasMany(item::class, 'fornecedor_id', 'id');
     }
}
