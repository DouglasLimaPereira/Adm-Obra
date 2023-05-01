<?php

namespace Database\Seeders;

use App\Models\Modulo;
use App\Models\Moduloitem;
use Illuminate\Database\Seeder;

class ModuloTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $modulos = [
            'gerencia' => 'Gerência',
            'producao-propria' => 'Produção Própria',
            'producao-terceirizada' => 'Produção Terceirizada',
            'qualidade' => 'Qualidade',
            'clientes' => 'Clientes',
            'sistema' => 'Sistema',
        ];

        $itens_gerencia = [
            'obras' => 'Obras',
            'funcoes' => 'Funções',
            'exames' => 'Exames',
            'epi' => 'EPI',
            'funcionarios' => 'Funcionários',
            'locais-de-producao' => 'Locais de Produção',
            'ponto-diario' => 'Ponto Diário',
            'diario-de-obras' => 'Diário de Obras',
            'relatorios-e-graficos' => 'Relatórios e Gráficos'
        ];

        $itens_producao_propria = [
            'equipes' => 'Equipes',
            'pacotes-de-servico' => 'Pacotes de Serviço',
            'ordens-de-servico' => 'Ordens de Serviço',
            'inspecoes-de-servico' => 'Inspeções de Serviço',
            'medicoes-de-producao' => 'Medições de Produção'
        ];

        $itens_producao_terceirizada = [
            'fornecedores' => 'Fornecedores',
            'contratos' => 'Contratos',
            'ordens-de-servico' => 'Ordens de Serviço',
            'inspecoes-de-servico' => 'Inspeções de Serviço',
            'medicoes-de-producao' => 'Medições de Produção'
        ];

        $itens_qualidade = [
            'controle-tecnologico' => 'Controle Tecnológico',
            'documentos' => 'Documentos',
            'projetos' => 'Projetos',
            'sustentabilidade' => 'Sustentabilidade',
            'indicadores-de-qualidade' => 'Indicadores de Qualidade',
            'analise-critica' => 'Análise Crítica',
            'auditorias' => 'Auditorias',
            'pesquisa-de-satisfacao' => 'Pesquisa de Satisfação',
            'treinamentos' => 'Treinamentos',
            'instrucoes-de-trabalho' => 'Instruções de Trabalho',
            'inspecao-final-de-obra' => 'Inspeção Final de Obra',
            'inconformidades' => 'Inconfirmidades'
        ];

        $itens_clientes = [
            'clientes' => 'Clientes',
            'chamados' => 'Chamados do Cliente',
            'unidades-habitacionais' => 'Unidades Habitiacionais',
            'financeiro' => 'Financeiro',
            'avisos' => 'Avisos a Clientes',
            'galeria-de-imagens' => 'Galeria de Imagens',
            'indicacoes' => 'Indicações'
        ];

        $itens_sistema = [
            'permissoes' => 'Permissões',
            'usuarios' => 'Usuários',
            'mensagens' => 'Mensagens',
            'construtora' => 'Construtora',
        ];

        foreach ($modulos as $key => $value) {
            $modulo = Modulo::create([
                'nome' => $value,
                'slug' => $key,
                'descricao' => '',
                'active' => true
            ]);
            if($modulo->slug === 'gerencia'){
                foreach ($itens_gerencia as $key => $value) {
                    $item = $modulo->itens()->create([
                        'nome' => $value,
                        'slug' => $key,
                        'active' => 1
                    ]);
                    if($item->slug === 'obras'){
                        $item->subitens()->create([
                            'modulo_id' => $modulo->id,
                            'nome' => 'Obras',
                            'slug' => 'obras',
                            'active' => 1
                        ]);

                        $item->subitens()->create([
                            'modulo_id' => $modulo->id,
                            'nome' => 'Fatores',
                            'slug' => 'fatores',
                            'active' => 1
                        ]);
                    }

                    if($item->slug === 'funcoes'){
                        $item->subitens()->create([
                            'modulo_id' => $modulo->id,
                            'nome' => 'Funções',
                            'slug' => 'funcoes',
                            'active' => 1
                        ]);

                        $item->subitens()->create([
                            'modulo_id' => $modulo->id,
                            'nome' => 'Histórico de Salários',
                            'slug' => 'historico-de-salarios',
                            'active' => 1
                        ]);
                    }

                    if($item->slug === 'exames'){
                        $item->subitens()->create([
                            'modulo_id' => $modulo->id,
                            'nome' => 'Tipos de Exames',
                            'slug' => 'tipos-de-exames',
                            'active' => 1
                        ]);

                        $item->subitens()->create([
                            'modulo_id' => $modulo->id,
                            'nome' => 'Exames de Funcionários',
                            'slug' => 'exames-de-funcionarios',
                            'active' => 1
                        ]);
                    }

                    if($item->slug === 'epi'){
                        $item->subitens()->create([
                            'modulo_id' => $modulo->id,
                            'nome' => 'Tipos de EPI',
                            'slug' => 'tipos-de-epi',
                            'active' => 1
                        ]);

                        $item->subitens()->create([
                            'modulo_id' => $modulo->id,
                            'nome' => 'EPI de Funcionários',
                            'slug' => 'epi-de-funcionarios',
                            'active' => 1
                        ]);
                    }

                    if($item->slug === 'funcionarios'){
                        $item->subitens()->create([
                            'modulo_id' => $modulo->id,
                            'nome' => 'Funcionários',
                            'slug' => 'funcionarios',
                            'active' => 1
                        ]);

                        $item->subitens()->create([
                            'modulo_id' => $modulo->id,
                            'nome' => 'Histórico de Funções',
                            'slug' => 'historico-de-funcoes',
                            'active' => 1
                        ]);
                    }

                    if($item->slug === 'ponto-diario'){
                        $item->subitens()->create([
                            'modulo_id' => $modulo->id,
                            'nome' => 'Ponto Diário',
                            'slug' => 'ponto-diario',
                            'active' => 1
                        ]);

                        $item->subitens()->create([
                            'modulo_id' => $modulo->id,
                            'nome' => 'Relatório de Ponto',
                            'slug' => 'relatorio-de-ponto',
                            'active' => 1
                        ]);

                        $item->subitens()->create([
                            'modulo_id' => $modulo->id,
                            'nome' => 'Relatório de Horas',
                            'slug' => 'relatorio-de-horas',
                            'active' => 1
                        ]);
                    }

                    if($item->slug === 'diario-de-obras'){
                        $item->subitens()->create([
                            'modulo_id' => $modulo->id,
                            'nome' => 'Ocorrências',
                            'slug' => 'ocorrencias',
                            'active' => 1
                        ]);

                        //Teste

                        $item->subitens()->create([
                            'modulo_id' => $modulo->id,
                            'nome' => 'Registros',
                            'slug' => 'registros',
                            'active' => 1
                        ]);
                    }
                }
            }
            
            if($modulo->slug === 'producao-propria'){
                foreach ($itens_producao_propria as $key => $value) {
                    $modulo->itens()->create([
                        'nome' => $value,
                        'slug' => $key,
                        'active' => 1
                    ]);
                }
            }

            if($modulo->slug === 'producao-terceirizada'){
                foreach ($itens_producao_terceirizada as $key => $value) {
                    $modulo->itens()->create([
                        'nome' => $value,
                        'slug' => $key,
                        'active' => 1
                    ]);
                }
            }

            if($modulo->slug === 'qualidade'){
                foreach ($itens_qualidade as $key => $value) {
                    $modulo->itens()->create([
                        'nome' => $value,
                        'slug' => $key,
                        'active' => 1
                    ]);
                }
            }

            if($modulo->slug === 'clientes'){
                foreach ($itens_clientes as $key => $value) {
                    $modulo->itens()->create([
                        'nome' => $value,
                        'slug' => $key,
                        'active' => 1
                    ]);
                }
            }

            if($modulo->slug === 'sistema'){
                foreach ($itens_sistema as $key => $value) {
                    $modulo->itens()->create([
                        'nome' => $value,
                        'slug' => $key,
                        'active' => 1
                    ]);
                }
            }
        }
    }
}
 