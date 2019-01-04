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
        // O seeder serve para inserir valores em uma tabela
        //preparar a tabela para o desenvolveodr
        $this->call(CategoriasSeeder::class);
    }
}
