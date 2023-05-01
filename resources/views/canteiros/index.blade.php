@extends('layout.app')

@section('title', 'Construtoras - Empreendimentos')

@section('page-title', 'Construtoras / '. $company->nome_fantasia. ' / Empreendimentos')

@section('content')

    <div class="row">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">
                    <h3 class="card-title">Selecione um canteiro</h3>
                    <div class="card-tools">
                        <ul class="nav nav-pills ml-auto">
                            <li class="nav-item">
                                @if($company_count > 0)
                                    <a href="{{route('construtoras.canteiros.create', $company->id)}}" class="nav-link active"><i class="fas fa-plus-circle"></i> NOVO EMPREENDIMENTO</a>
                                @endif
                            </li>
                        </ul>
                    </div>
                </div>
                <!-- /.card-header -->
                <div class="card-body">
                    @if($company_count == 0)
                        <div class="row">
                            <div class="col-md-12">
                                <div class="alert alert-info alert-dismissible">
                                    <h5><i class="icon fas fa-check"></i> Atenção!</h5>
                                    Para cadastrar um Canteiro, antes deve existir ao menos uma Construtora para vínculo do canteiro.<br>
                                    <a href="{{route('construtoras.create')}}" class="btn btn-sm btn-primary text-decoration-none mt-2">CADASTRAR NOVA CONSTRUTORA</a>
                                </div>
                            </div>
                        </div>
                    @endif
                    @include('partials.datatables.buttons')
                    <table id="table-datatable" class="table table-bordered table-striped table-hover table-responsve-md dataTable dtr-inline">
                        <thead>
                            <tr>
                                <th style="width: 10px">ID</th>
                                <th>Nome</th>
                                <th>Gerente</th>
                                <th>Cidade</th>
                                <th>UF</th>
                                <th>Telefone</th>
                                <th>Email</th>
                                <th>AÇÕES</th>
                            </tr>
                        </thead>
                        <tbody>
                            @forelse ($rows as $row)
                                <tr>
                                    <td>{{$row->id}}</td>
                                    <td>{{$row->nome}}</td>
                                    <td>
                                        {!!($x = $row->funcionarios()->firstWhere('gerente', 1)) ? $x->funcionario->pessoa->nome : '<span class="text-danger">Não definido</span>'!!}
                                    </td>
                                    <td>{{$row->cidade}}</td>
                                    <td>{{$row->uf}}</td>
                                    <td>{{$row->telefone}}</td>
                                    <td>{{$row->email}}</td>
                                    <td class="td-1p">
                                        <div class="dropdown">
                                            <button class="btn btn-light" type="button" id="dropdownMenu2" data-toggle="dropdown" aria-expanded="false">
                                                <i class="fas fa-ellipsis-v"></i>
                                            </button>
                                            <div class="dropdown-menu dropdown-menu-right" aria-labelledby="dropdownMenu2">
                                                <a href="{{route('construtoras.canteiros.edit', [$company->id, $row->id])}}" class="dropdown-item"><i class="far fa-edit"></i> Editar</a>
                                                <div class="dropdown-divider"></div>
                                                <a href="{{route('construtoras.indices.index', [$row->company_id, $row->id])}}" class="dropdown-item"><i class="far fa-clock"></i> Índices H.E</a>
                                                {{-- <a href="{{route('canteiros.edit', $row->id)}}" class="dropdown-item"><i class="far fa-edit"></i> Editar</a> --}}
                                                <div class="dropdown-divider"></div>
                                                <a href="javascript:void(0)" class="dropdown-item text-danger" onclick="remover({{$row->company_id}}, {{$row->id}})"><i class="fas fa-trash"></i> Remover</a>
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
                        {!! $rows->links() !!}
                    </div>
                </div>
            </div>
        </div>
    </div>

@endsection

{{-- Removendo o registro --}}
<script>
    function remover(company_id, canteiro_id){
        
        $confirmacao = confirm('Tem certeza que deseja remover este registro?');

        if($confirmacao){
            window.location.href = "{{url('/')}}/construtoras/"+company_id+"/canteiros/"+canteiro_id+"/destroy"
        }
    }
</script>

