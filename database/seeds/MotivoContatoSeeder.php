<?php

use Illuminate\Database\Seeder;
use \App\MotivoContato;

class MotivoContatoSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        MotivoContato::create(['motivo_contato' => 'elogio']);
        MotivoContato::create(['motivo_contato' => 'duvida']);
        MotivoContato::create(['motivo_contato' => 'reclamacao']);
    }
}
