<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AjusteProdutosFiliais extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        // criando a tabela filiais
       Schema::create('filiais', function (Blueprint $table){
        $table->id();
        $table->string('filial', 30);  
        $table->timestamps();

        
    });

        // criando a taela produto_filiais
        Schema::create('produto_filiais', function (Blueprint $table){
            $table->id();
            $table->unsignedBigInteger('filial_id');
            $table->unsignedBigInteger('produto_id');
            $table->decimal('preco_venda', 8, 2);
            $table->integer('estoque_min');
            $table->integer('estoque_max');
            $table->timestamps();
      
        // foreign key (constraint)
            $table->foreign('filial_id')->references('id')->on('filiais');
            $table->foreign('produto_id')->references('id')->on('produtos');
    
    });
        
        // removendo colunas da tabela produtos
         Schema::table('produtos', function (Blueprint $table){
        $table->dropColumn(['preco_venda', 'estoque_min', 'estoque_max']);
    });
}
    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        //adicionar colunas da tabela produtos
         Schema::table('produtos', function (Blueprint $table){ 
            $table->decimal('preco_venda', 8,2);
            $table->integer('estoque_min');
            $table->integer('estoque_max');
        });
        
        Schema::dropIfExists('produto_filiais');

        Schema::dropIfExists('filiais');
    
    }
}
