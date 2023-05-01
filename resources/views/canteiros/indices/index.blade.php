@extends('layout.app')

@section('title', 'Construtoras - Empreendimentos')

@section('page-title', 'Construtoras / '. $company->nome_fantasia. ' / Empreendimentos')

@section('content')

    <div class="row">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header"><i class="far fa-clock"></i> Índices de horas extras</div>
                <div class="card-body">
                    <div class="callout callout-info">
                        <h3>{{$canteiro->nome}}</h3>
                        <hr>
                        <b>Código: </b> {{$canteiro->id}}<br>
                        <b>Gerente: </b> {!!($x = $canteiro->funcionarios()->firstWhere('gerente', 1)) ? $x->funcionario->pessoa->nome : '<span class="text-danger">Não definido</span>'!!}<br>
                        <b>Endereço: </b> 
                            {{$canteiro->logradouro}},
                            Nº {{$canteiro->numero}}, {{($canteiro->complemento) ? '{$canteiro->logradouro} ,' : ''}}
                            {{$canteiro->bairro}}, <span class="cep-view">{{$canteiro->cep}}</span>, {{$canteiro->cidade}} - {{$canteiro->uf}}<br>
                        <b>Telefone: </b> {{$canteiro->telefone}}<br>
                        <b>E-mail: </b> {{$canteiro->email}}<br>
                        <b>Estado do empreendimento:</b>
                        @switch($canteiro->estado)
                            @case(1)
                                <span class="badge badge-primary" style="font-size:15px">Em andamento</span>
                                @break
                            @case(2)
                                <span class="badge badge-success" style="font-size:15px">Concluída</span>
                                @break
                            @case(3)
                                <span class="badge badge-danger" style="font-size:15px">Inativa</span>
                                @break
                            @default
                        @endswitch
                    </div>

                    <div class="card">
                        <div class="card-header bg-primary font-weight-bold">Índices</div>
                        <div class="card-body">
                            <table class="table table-bordered table-hover table-responsive-md">
                                <thead>
                                    <tr>
                                        <th class="text-center" style="width: 22px">Segunda a sexta-feira</th>
                                        <th class="text-center" style="width: 22px">Sábados e domingos</th>
                                        <th class="text-center" style="width: 22px">Feriados</th>
                                        <th class="text-center" style="width: 22px">Vigência</th>
                                        <th class="text-center" style="width: 12px">Ações</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @forelse ($indices as $indice)
                                        <tr>
                                            <td class="text-center">
                                                {{number_format($indice->indice_produtivo, 2, ',', '')}}
                                                <input type="hidden" class="indice-produtivo-{{$indice->id}}" value="{{$indice->indice_produtivo}}">
                                            </td>
                                            <td class="text-center">
                                                {{number_format($indice->indice_improdutivo, 2, ',', '')}}
                                                <input type="hidden" class="indice-improdutivo-{{$indice->id}}" value="{{$indice->indice_improdutivo}}">
                                            </td>
                                            <td class="text-center">
                                                {{number_format($indice->indice_feriado, 2, ',', '')}}
                                                <input type="hidden" class="indice-feriado-{{$indice->id}}" value="{{$indice->indice_feriado}}">
                                            </td>
                                            <td class="text-center">
                                                {{($indice->primeira_vigencia) ? '-' : date('d/m/Y', strtotime($indice->data_vigencia))}}
                                                <input type="hidden" class="data-vigencia-{{$indice->id}}" value="{{$indice->data_vigencia}}">
                                                <input type="hidden" class="primeira-vigencia-{{$indice->id}}" value="{{$indice->primeira_vigencia}}">
                                            </td>
                                            <td>
                                                <div class="dropdown">
                                                    <button class="btn btn-light" type="button" id="dropdownMenu2" data-toggle="dropdown" aria-expanded="false">
                                                        <i class="fas fa-ellipsis-v"></i>
                                                    </button>
                                                    <div class="dropdown-menu dropdown-menu-right" aria-labelledby="dropdownMenu2">
                                                        <a href="javascript:void(0)" class="dropdown-item" onclick="editaIndice({{$indice->id}})"><i class="far fa-edit"></i> Editar</a>
                                                        @if(!$indice->primeira_vigencia && $indice['remover'])
                                                            <div class="dropdown-divider"></div>
                                                            <a href="javascript:void(0)" class="dropdown-item text-danger" onclick="remover({{$company->id}}, {{$canteiro->id}}, {{$indice->id}})"><i class="fas fa-trash"></i> Remover</a>
                                                        @endif
                                                    </div>
                                                </div>
                                            </td>
                                        </tr>
                                    @empty
                                        <tr>
                                            <td colspan="5"><span class="text-danger">Nenhum registro encontrado.</span></td>
                                        </tr>
                                    @endforelse
                                </tbody>
                            </table>
                        </div>
                        <div class="card-footer">
                            <a href="{{route('construtoras.canteiros.index', [$company->id])}}" class="btn btn-sm btn-danger"><i class="fas fa-undo-alt"></i> Voltar</a>
                            <a href="javascript:void(0)" class="btn btn-sm btn-primary" onclick="novoIndice()">Incluir índice</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    @include('canteiros.indices._partials.modal-novo-indice')
    @include('canteiros.indices._partials.modal-edita-indice')
@endsection

@section('scripts')
    {{-- Cadastro de um novo índice --}}
    <script>
        function novoIndice()
        {
            $('.novo-indice').modal()
        }
    </script>

    {{-- Edição de um índice --}}
    <script>
        function editaIndice(indice_id)
        {
            let indice_produtivo = Number($('.indice-produtivo-'+indice_id).val())
            let indice_improdutivo = Number($('.indice-improdutivo-'+indice_id).val())
            let indice_feriado = Number($('.indice-feriado-'+indice_id).val())
            let data_vigencia = $('.data-vigencia-'+indice_id).val()
            let primeira_vigencia = $('.primeira-vigencia-'+indice_id).val()

            $('#m-indice-produtivo').val(indice_produtivo)
            $('#m-indice-improdutivo').val(indice_improdutivo)
            $('#m-indice-feriado').val(indice_feriado)
            $('#m-data-vigencia').val(data_vigencia)
            $('#m-indice-id').val(indice_id)

            if(primeira_vigencia){
                $('.col-data-vigencia').hide()
            }else{
                $('.col-data-vigencia').show()
            }
            $('.edita-indice').modal()

        }
    </script>

    {{-- Remover fator --}}
    <script>
        function remover(company_id, canteiro_id, indice_id)
        {
            confirm = confirm('Tem certeza que deseja remover este registro?')
            if(confirm){
                window.location.href = "{{url('/')}}/construtoras/"+company_id+"/canteiros/"+canteiro_id+"/indices/"+indice_id+"/destroy"
            }
        }
    </script>

@endsection