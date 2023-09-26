<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;
use Illuminate\Support\Facades\DB;

class AlterProdutosRelacionamentoFornecedores extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        
        Schema::table('produtos', function (Blueprint $table) {
            
            // insere um registro default para estabelecer o recionamneto e um evitar errro nesse caso especifico
            $fornecedor_id = DB::table('fornecedores')->insertGetId( [
                'nome' => 'Fornecedor Default SG',
                'site' => 'fornecedordefault.com.br',
                'uf' => 'sp',
                'email' => 'fornecedordefault@gmail.com', 
           ]);

            $table->unsignedBigInteger('fornecedor_id')->default($fornecedor_id)->after('id');
            $table->foreign('fornecedor_id')->references('id')->on('fornecedores');

        });
    }


    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
         Schema::table('produtos', function (Blueprint $table) {
            $table->dropForeign('produtos_fornecedor_id_foreign');
            $table->dropColumn('fornecedor_id');
         });

    }
}
