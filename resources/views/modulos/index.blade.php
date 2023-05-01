@extends('layout.app')

@section('title', 'Módulos')

@section('page-title', 'Módulos')

@section('content')

<div class="row">
    <div class="col-md-12">
        <div class="card">
            <div class="card-header">
                <h3 class="card-title">Selecione um módulo</h3>
                <div class="card-tools">
                    <ul class="nav nav-pills ml-auto">
                        <li class="nav-item">
                            <a href="{{route('modulos.create')}}" class="nav-link active"><i class="fas fa-plus-circle"></i> NOVO MÓDULO</a>
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
                            <th>Ativo</th>
                            <th>AÇÕES</th>
                        </tr>
                    </thead>
                    <tbody>
                        @forelse ($rows as $row)
                            <tr>
                                <td>{{$row->id}}</td>
                                <td>{{$row->nome}}</td>
                                <td>{!!($row->active) ? '<span class="badge bg-primary">SIM</span>' : '<span class="badge bg-secondary">NÃO</span>' !!}</td>
                                <td class="td-1p">
                                    <div class="dropdown">
                                        <button class="btn btn-light" type="button" id="dropdownMenu2" data-toggle="dropdown" aria-expanded="false">
                                            <i class="fas fa-ellipsis-v"></i>
                                        </button>
                                        <div class="dropdown-menu dropdown-menu-right" aria-labelledby="dropdownMenu2">
                                            <a href="{{route('modulos.edit', [$row->id])}}" class="dropdown-item"><i class="far fa-edit"></i> Editar</a>
                                            <div class="dropdown-divider"></div>
                                            <a href="{{route('modulos.itens.index', [$row->id])}}" class="dropdown-item"><i class="fas fa-list"></i> Itens</a>
                                            <div class="dropdown-divider"></div>
                                            <a href="javascript:void(0)" class="dropdown-item text-danger" onclick="remover({{$row->id}})"><i class="fas fa-trash"></i> Remover</a>
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
                    {{-- {!! $company-->links() !!} --}}
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
{{-- Removendo o registro --}}
<script>
    function remover(val){
        $confirmacao = confirm('Tem certeza que deseja remover este registro?');

        if($confirmacao){
            window.location.href = "{{url('/')}}/modulos/"+val+'/destroy'
        }
    }
</script>