<?php

use Illuminate\Database\Seeder;
use \App\SiteContato;

class Site_Contato_Seed extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        /*
        $site_contato = new SiteContato();
        $site_contato->nome = 'leandro';
        $site_contato->telefone = '(11) 945845547';
        $site_contato->email = 'leandro123@gmail.com';
        $site_contato->motivo_contato = '2';
        $site_contato->mensagem = 'ola, foi muuito legal';
        $site_contato->save();
        */

        factory(SiteContato::class, 100)->create();

    }
}
