@if($errors->any())
    <div class="alert alert-danger" role="alert">
        <ul class="list">
        @foreach ($errors->all() as $erro)
            <li>{{$erro}}</li>
        @endforeach
        </ul>
    </div>
@endif

@if(isset($modulo))
    <form action="{{route('modulos.update', $modulo->id)}}" method="POST" enctype="multipart/form-data">
    @method('PUT')
@else
    <form action="{{route('modulos.store')}}" method="POST" enctype="multipart/form-data">    
@endif
    @csrf

    <div class="row">
        <div class="col-md-9">
            <div class="form-group">
                <label for="nome">Nome *</label>
                <input type="text" class="form-control" name="nome" value="{{isset($modulo) ? $modulo->nome : old('nome')}}" required>
            </div>
        </div>
        <div class="col-md-3">
            <div class="form-group">
                <label for="active">Ativo *</label>
                <select name="active" id="active" class="form-control" required>
                    <option value="">Selecione...</option>
                    <option value="1" {{(isset($modulo) && $modulo->active == true) ? 'selected' : old('active')}}>SIM</option>
                    <option value="0" {{(isset($modulo) && $modulo->active == false) ? 'selected' : old('active')}}>NÃO</option>
                </select>
            </div>
        </div>
    </div>

    <div class="row">
        <div class="col-md-12">
            <div class="form-group">
                <label for="descricao">Descrição</label>
                <textarea name="descricao" id="descricao" class="form-control" rows="5">{{isset($modulo) ? $modulo->descricao : ''}}</textarea>
            </div>
        </div>
    </div>

    <hr>
    <a href="{{route('modulos.index')}}" class="btn btn-sm btn-secondary"><i class="fas fa-undo-alt"></i> CANCELAR</a>
    <button type="submit" class="btn btn-sm btn-success">{!!(isset($modulo)) ? '<i class="fas fa-sync"></i> ATUALIZAR' : '<i class="fas fa-save"></i> SALVAR'!!}</button>
</form>