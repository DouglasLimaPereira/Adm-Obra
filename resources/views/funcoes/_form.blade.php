@if($errors->any())
    <div class="alert alert-danger" role="alert">
        <ul class="list">
        @foreach ($errors->all() as $erro)
            <li>{{$erro}}</li>
        @endforeach
        </ul>
    </div>
@endif

@if(isset($funcao))
    <form action="{{route('construtoras.funcoes.update', [$funcao->company_id, $funcao->id])}}" method="POST">
    @method('PUT')
@else
    <form action="{{route('construtoras.funcoes.store', $company->id)}}" method="POST">
@endif
    @csrf
    
    <div class="row">
        <div class="col-md-10">
            <div class="form-group">
                <label for="nome">Nome *</label>
                <input type="text" name="nome" class="form-control" id="nome" value="{{(isset($funcao)) ? $funcao->nome : old('nome')}}" required>
            </div>
        </div>
        <div class="col-md-2">
            <div class="form-group">
                <label for="tipo">Tipo *</small></a></label>
                <select name="tipo" id="tipo" class="form-control" required>
                    <option value="">Selecione...</option>
                    <option value="1" {{(isset($funcao) && $funcao->tipo == 1) ? 'selected' : ''}}>Mão de obra produtiva</option>
                    <option value="2" {{(isset($funcao) && $funcao->tipo == 2) ? 'selected' : ''}}>Mão de obra improdutiva</option>
                    <option value="3" {{(isset($funcao) && $funcao->tipo == 3) ? 'selected' : ''}}>Administração</option>
                </select>
            </div>
        </div>
    </div>

    <div class="row">
        <div class="col-md-12">
            <div class="form-group">
                <label for="descricao">Descrição</label>
                <textarea name="descricao" class="form-control" id="descricao" rows="3">{{(isset($funcao)) ? $funcao->descricao : old('descricao')}}</textarea>
            </div>
        </div>
    </div>

    <hr>
    <a href="{{route('construtoras.funcoes.index', $company->id)}}" class="btn btn-sm btn-secondary"><i class="fas fa-undo-alt"></i> CANCELAR</a>
    <button type="submit" class="btn btn-sm btn-success">{!!(isset($funcao)) ? '<i class="fas fa-sync"></i> ATUALIZAR' : '<i class="fas fa-save"></i> SALVAR'!!}</button>
</form>