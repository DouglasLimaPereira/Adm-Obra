<?php

namespace Database\Seeders;

use App\Models\Permissao;
use Illuminate\Database\Seeder;

class PermissoesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $permissoes = [
            'autorizar' => 'Autorizar',
            'editar' => 'Editar',
            'excluir' => 'Excluir',
            'exportar' => 'Exportar',
            'fechar' => 'Fechar',
            'imprimir' => 'Imprimir',
            'index' => 'index',
            'incluir' => 'Incluir',
            'menu' => 'Menu',
            'reinspecionar' => 'Reinspecionar',
            'visualizar' => 'Visualizar',
            'incluir' => 'Incluir',
            'importar' => 'Importar'
        ];

        foreach ($permissoes as $key => $value) {
            Permissao::create([
                'nome' => $value,
                'slug' => $key,
                'descricao' => '',
                'active' => true
            ]);
        }
    }
}
