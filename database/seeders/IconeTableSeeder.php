<?php

namespace Database\Seeders;

use App\Models\Icone;
use Illuminate\Database\Seeder;

class IconeTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $icones = [
            'alvenaria' => 'alvenaria.svg',
            'antena' =>	'antena.svg',
            'aterramento' => 'aterramento.svg',
            'ceramica' => 'ceramica.svg',
            'coberta' => 'coberta.svg',
            'eletrica' => 'eletrica.svg',
            'elevador' => 'elevador.svg',
            'escavador' => 'escavador.svg',
            'esquadrias' => 'esquadrias.svg',
            'estrutura' => 'estrutura.svg',
            'fundacao' => 'fundacao.svg',
            'gas' => 'gas.svg',
            'hidrante' => 'hidrante.svg',
            'hidrosanitaria' => 'hidrosanitaria.svg',
            'impermeabilizacao' => 'impermeabilizacao.svg',
            'laje' => 'laje.svg',
            'limpeza' => 'limpeza.svg',
            'logica' => 'logica.svg',
            'loucas' => 'loucas.svg',
            'pintura' => 'pintura.svg',
            'piso' => 'piso.svg',
            'porta' => 'porta.svg',
            'raio' => 'raio.svg',
            'reboco' => 'reboco.svg',
            'vaso' => 'vaso.svg'
        ];

        foreach($icones as $key => $icone){
            Icone::create([
                'nome' => $key,
                'arquivo' => $icone
            ]);
        }
    }
}