<?php

namespace Database\Seeders;

use App\Models\Unidademedida;
use Illuminate\Database\Seeder;

class UnidademedidaTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $unidades = [
            'Centímetro' => 'cm',
            'Centímetro Quadrado' => 'cm2',
            'Kilograma' => 'kg',
            'Metro' => 'm',
            'Metro quadrado' => 'm2',
            'Metro cúbico' => 'm3',
            'Dia' => 'D',
            'Hora' => 'H',
            'Mês' => 'M',
            'Reais' => 'R$',
            'Unidade' => 'Und',
            'Verba' => 'Vb',
            'Porcentagem' => '%',
            'Pavimento' => 'Pav'
        ];

        foreach ($unidades as $key => $unidade) {
            Unidademedida::create([
                'nome' => $key,
                'sigla' => $unidade
            ]);
        }
        
    }
}
