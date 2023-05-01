@extends('layout.app')

@section('title', 'Construtoras - Funções')

@section('page-title', 'Construtoras / '. $company->razao_social. ' / Funções')

@section('content')

    <div class="row">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">
                    <h3 class="card-title">Selecione uma função</h3>
                    <div class="card-tools">
                        <ul class="nav nav-pills ml-auto">
                            <li class="nav-item">
                                <a href="{{route('construtoras.funcoes.create', $company->id)}}" class="nav-link active"><i class="fas fa-plus-circle"></i> NOVA FUNÇÃO</a>
                            </li>
                        </ul>
                    </div>
                </div>
                <!-- /.card-header -->
                <div class="card-body">
                    @include('partials.datatables.buttons')
                    <table id="table-datatable" class="table table-bordered table-striped table-hover table-responsve-md dataTable dtr-inline">
                        <thead>
                            <tr>
                                <th style="width: 10px">ID</th>
                                <th>Nome</th>
                                <th>Descrição</th>
                                <th>Tipo</th>
                                <th>AÇÕES</th>
                            </tr>
                        </thead>
                        <tbody>
                            @forelse ($company->funcoes as $row)
                                <tr>
                                    <td>{{$row->id}}</td>
                                    <td>{{$row->nome}}</td>
                                    <td>{{$row->descricao}}</td>
                                    <td>
                                        @switch($row->tipo)
                                            @case(1)
                                                Mão de obra produtiva
                                            @break
                                            @case(2)
                                                Mão de obra improdutiva
                                            @break
                                            @case(3)
                                                Administração
                                            @break
                                        @endswitch
                                    </td>
                                    <td class="td-1p">
                                        <div class="dropdown">
                                            <button class="btn btn-light" type="button" id="dropdownMenu2" data-toggle="dropdown" aria-expanded="false">
                                                <i class="fas fa-ellipsis-v"></i>
                                            </button>
                                            <div class="dropdown-menu dropdown-menu-right" aria-labelledby="dropdownMenu2">
                                                <a href="{{route('construtoras.funcoes.edit', [$company->id, $row->id])}}" class="dropdown-item"><i class="far fa-edit"></i> Editar</a>
                                                <div class="dropdown-divider"></div>
                                                <a href="javascript:void(0)" class="dropdown-item text-danger" onclick="remover({{$company->id}}, {{$row->id}})"><i class="fas fa-trash"></i> Remover</a>
                                            </div>
                                          </div>
                                    </td>
                                </tr>
                            @empty
                            <tr>
                                <td colspan="8"><span class="text-danger">Nenhum registro encontrado</span></td>
                            </tr>
                            @endforelse
                        </tbody>
                    </table>
                    <br>
                    <div class="d-flex">
                        <!-- paginação -->
                    </div>
                </div>
            </div>
        </div>
    </div>

@endsection

{{-- Removendo o registro --}}
<script>
    function remover(company, funcao){
        $confirmacao = confirm('Tem certeza que deseja remover este registro?');

        if($confirmacao){
            window.location.href = "{{url('/')}}/construtoras/"+company+"/funcoes/"+funcao+"/destroy"
        }
    }
</script>