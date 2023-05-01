<?php

namespace Database\Seeders;

use App\Models\Perfil;
use Illuminate\Database\Seeder;

class PerfilTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $perfis = [
            'Administrador',
            'Gerente',
            'Padrão',
            'Superadmin'
        ];

        foreach ($perfis as $key => $value) {
            Perfil::create([
                'company_id' => 1,
                'nome' => $value,
                'descricao' => 'Descrição ' . $key,
                'active' => true
            ]);
        }

        foreach ($perfis as $key => $value) {
            Perfil::create([
                'company_id' => 2,
                'nome' => $value,
                'descricao' => 'Descrição ' . $key,
                'active' => true
            ]);
        }
    }
}
