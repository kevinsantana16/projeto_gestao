<?php

use Illuminate\Database\Seeder;
use \App\Fornecedores;

class FornecedorSeed extends Seeder

{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        // metodo 1 para criacao de seeds -- Instanciando o objeto
        $fornecedor = new Fornecedores();
        $fornecedor->nome = 'Fornecedor100';
        $fornecedor->uf = 'SP';
        $fornecedor->site = 'fornecedor100.com.br';
        $fornecedor->email = 'fornecedor100@gmail.com';
           $fornecedor->save();
        
        
        // metodo 2 para criacao de seeds
        Fornecedores::create([
          'nome' => 'Fornecedor200',
          'uf' => 'RJ',
          'site' => 'Fornecedor200.com.br',
          'email' => 'Fornecedor200@gmail.com'
        ]);

    }
}
