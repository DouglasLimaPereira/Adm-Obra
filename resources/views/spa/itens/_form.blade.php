@if($errors->any())
    <div class="alert alert-danger" role="alert">
        <ul class="list">
        @foreach ($errors->all() as $erro)
            <li>{{$erro}}</li>
        @endforeach
        </ul>
    </div>
@endif

@if(isset($item))
    <form action="{{route('itens.update', $item->id)}}" method="POST" enctype="multipart/form-data">
    @method('PUT')
@else
    <form action="{{route('itens.store')}}" method="POST" enctype="multipart/form-data">
@endif
    @csrf

    <div class="row">
        <div class="col-md-12">
            <div class="form-group">
                <label for="modulo_id">Módulo *</label>
                <select name="modulo_id" id="modulo_id" class="form-control" required>
                    <option value="">Selecione...</option>
                    @forelse ($modulos as $modulo)
                        <option value="{{$modulo->id}}" {{(isset($item) && ($modulo->id == $item->modulo_id)) ? 'selected' : ''}}>{{$modulo->nome}}</option>
                    @empty
                        <option value="">Nenhum registro encontrado.</option>
                    @endforelse
                </select>
            </div>
        </div>
    </div>

    <div class="row">
        <div class="col-md-9">
            <div class="form-group">
                <label for="nome">Nome *</label>
                <input type="text" class="form-control" name="nome" value="{{isset($item) ? $item->nome : old('nome')}}" required>
            </div>
        </div>
        <div class="col-md-3">
            <div class="form-group">
                <label for="active">Ativo *</label>
                <select name="active" id="active" class="form-control" required>
                    <option value="">Selecione...</option>
                    <option value="1" {{(isset($item) && $item->active == true) ? 'selected' : old('active')}}>SIM</option>
                    <option value="0" {{(isset($item) && $item->active == false) ? 'selected' : old('active')}}>NÃO</option>
                </select>
            </div>
        </div>
    </div>

    <hr>
    <a href="{{route('itens.index')}}" class="btn btn-sm btn-secondary"><i class="fas fa-undo-alt"></i> CANCELAR</a>
    <button type="submit" class="btn btn-sm btn-success">{!!(isset($item)) ? '<i class="fas fa-sync"></i> ATUALIZAR' : '<i class="fas fa-save"></i> SALVAR'!!}</button>
</form>