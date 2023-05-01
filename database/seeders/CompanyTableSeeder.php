<?php

namespace Database\Seeders;

use App\Models\Company;
use App\Models\User;
use Illuminate\Support\Str;
use Illuminate\Database\Seeder;

class CompanyTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $company1 = Company::create([
            'razao_social' => 'Razão social 1',
            'nome_fantasia' => 'Nome Fantasia 1',
            'cnpj' => '00000000000001',
            'logradouro' => 'Rua 1',
            'numero' => '000001',
            'complemento' => '',
            'bairro' => 'Bairro 1',
            'cep' => '60000000',
            'cidade' => 'Fortaleza',
            'uf' => 'CE',
            'email' => 'construtora1@sago.com.br',
            'logotipo' => '',
            'estado' => 1,
            'limite_anexo' => 10.3,
            'email_financeiro' => 'emailf@const',
            'email_comercial' => 'emailcomercial@const',
            'telefone' => '(85) 000000001',
            'whatsapp' => '(85) 000000003',
            'website' => 'www.teste.com',
            'facebook' => 'seuperfil@perfil',
            'instagram' => 'seuperfil@perfil'
        ]);

        $company2 = Company::create([
            'razao_social' => 'Razão social 2',
            'nome_fantasia' => 'Nome Fantasia 2',
            'cnpj' => '00000000000002',
            'logradouro' => 'Rua 2',
            'numero' => '000002',
            'complemento' => '',
            'bairro' => 'Bairro 2',
            'cep' => '60000000',
            'cidade' => 'Fortaleza',
            'uf' => 'CE',
            'email' => 'construtora2@sago.com.br',
            'logotipo' => '',
            'estado' => 1,
            'limite_anexo' => 10.5,
            'email_financeiro' => 'emailf2@const',
            'email_comercial' => 'emailcomercial2@const',
            'telefone' => '(85) 000000002',
            'whatsapp' => '(85) 000000004',
            'website' => 'www.teste2.com',
            'facebook' => 'seuperfil2@perfil',
            'instagram' => 'seuperfil2@perfil'
        ]);
    }
}
