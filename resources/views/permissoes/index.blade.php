@extends('layout.app')

@section('title', 'Módulos - Permissões')

@section('page-title', 'Módulos - Permissões')

@section('content')

<div class="row">
    <div class="col-md-12">
        <div class="card">
            <div class="card-header">
                <h3 class="card-title">Seleção de permissões</h3>
                <div class="card-tools">
                    <ul class="nav nav-pills ml-auto">
                        <li class="nav-item">
                            {{-- <a href="javascript:void(0)" id="novo-subitem" class="nav-link active">NOVO SUBITEM</a> --}}
                            {{-- <a href="{{route('modulos.create')}}" class="nav-link active">NOVO ITEM</a> --}}
                        </li>
                    </ul>
                </div>
            </div>
            <!-- /.card-header -->
            <div class="card-body">
                <div class="callout callout-info">
                    <h5>Módulo: {{$item->modulo->nome}} - Item: {{$item->nome}} - Recurso: {{$subitem->nome}}</h5>
                </div>
                <div class="card">
                    <div class="card-header bg-light font-weight-bold">
                        Selecione as permissões para o recurso
                    </div>
                </div>
                <div class="icheck-danger mt-3">
                    <input type="checkbox" id="todos-itens">
                    <label for="todos-itens"><span class="text-danger">Marcar todas as opções</span></label>
                </div> 
                <form action="{{route('modulos.itens.subitens.permissoes.store', [$modulo->id, $item->id, $subitem->id])}}" method="POST">
                    @csrf
                    @forelse ($permissoes as $permissao)
                        <div class="icheck-primary mt-3">
                            <input type="checkbox" id="permissao-{{$permissao->id}}" name="permissao_id[]" value="{{$permissao->id}}" {{(isset($subitem) && ($subitem->permissoes->contains($permissao->id) == $permissao->id)) ? 'checked' : ''}}>
                            <label for="permissao-{{$permissao->id}}">{{$permissao->nome}}</label>
                        </div>          
                    @empty
                        <span class="text-danger">Nenhum registro encontrado.</span>    
                    @endforelse
                    <hr>
                    <a href="{{url()->previous()}}" class="btn btn-sm btn-secondary"><i class="fas fa-undo-alt"></i> CANCELAR</a>
                    <button type="submit" class="btn btn-sm btn-success">{!!(isset($permissao)) ? '<i class="fas fa-sync"></i> ATUALIZAR' : '<i class="fas fa-save"></i> SALVAR'!!}</button>
                </form>
            </div>
        </div>
    </div>
</div>
@endsection

@section('scripts')

<script>
    $('#todos-itens').click(function(){
        $('input:checkbox').not(this).prop('checked', this.checked);
    })

    $('#novo-subitem').click(function(){
        $('.novo-subitem').modal()
    })
    // Removendo o registro
    function remover(modulo_id, item_id, val){
        confirmacao = confirm('Tem certeza que deseja remover este registro?');
        if(confirmacao){
            window.location.href = "{{url('/')}}/modulos/"+modulo_id+'/itens/'+item_id+'/subitens/'+val+'/destroy'
        }
    }
</script>

@endsection