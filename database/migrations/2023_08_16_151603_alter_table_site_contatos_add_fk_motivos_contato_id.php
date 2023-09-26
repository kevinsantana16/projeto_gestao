<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Schema;

class AlterTableSiteContatosAddFkMotivosContatoId extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    { 
        // criando a coluna motivo_contato_id
         Schema::table('site_contatos', function (Blueprint $table) {
            $table->unsignedBigInteger('motivo_contato_id');  
        });

        // os registros de motivo_contato serao passados para motivo_contato_id
        DB::statement("update site_contatos set motivo_contato_id = motivo_contato");
        
        // transformando a coluna motivo_contato_id em uma fk e excluindo a coluna motivo_contato
        Schema::table('site_contatos', function (Blueprint $table) {
            $table->foreign('motivo_contato_id')->references('id')->on('motivo_contatos'); 
            $table->dropColumn('motivo_contato');
        });

        
          
       
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('site_contatos', function (Blueprint $table) {
            $table->unsignedBigInteger('motivo_contato');
            $table->dropForeign('site_contatos_motivo_contato_id_foreign');
            
        });
       
        // os registros de motivo_contato_id serao passados para motivo_contato
        DB::statement("update site_contatos set motivo_contato_id = motivo_contato");
        
        Schema::table('site_contatos', function (Blueprint $table) {
            $table->dropcolumn('motivo_contato_id');  
        });

    }
}
