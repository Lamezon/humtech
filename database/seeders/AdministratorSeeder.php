<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

class AdministratorsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('administrators')->insert([
            'nome' => 'GuaraContainer',
            'cnpj' => '26.453.836/0001-35',
            'endereco' => 'Rua Nelson R. Marcondes, 120, BRCAO 02',
            'telefone' => '(42)3624-3675',
        ]);
    }
}
