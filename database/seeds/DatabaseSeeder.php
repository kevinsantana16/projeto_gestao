<?php

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        // $this->call(UsersTableSeeder::class);
        $this->call(FornecedorSeed::class);
        $this->call(Site_Contato_Seed::class);
        $this->call(MotivoContatoSeeder::class);
    }
    
}
