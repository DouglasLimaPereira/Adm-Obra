@if($errors->any())
    <div class="alert alert-danger" role="alert">
        <ul class="list">
        @foreach ($errors->all() as $erro)
            <li>{{$erro}}</li>
        @endforeach
        </ul>
    </div>
@endif

@if(isset($subitem))
    <form action="{{route('subitens.update', $subitem->id)}}" method="POST" enctype="multipart/form-data">
    @method('PUT')
@else
    <form action="{{route('subitens.store')}}" method="POST" enctype="multipart/form-data">
@endif
    @csrf

    <div class="row">
        <div class="col-md-12">
            <div class="form-group">
                <label for="moduloitem_id">Item *</label>
                <select name="moduloitem_id" id="moduloitem_id" class="form-control moduloitem_id" data-live-search="true" data-style="border-secondary" required>
                    <option value="">Selecione...</option>
                    @forelse ($itens as $item)
                        <option value="{{$item->id}}" {{(isset($subitem) && ($item->id == $subitem->moduloitem_id)) ? 'selected' : ''}}>{{$item->nome}}</option>
                    @empty
                        <option value="">Nenhum registro encontrado...</option>
                    @endforelse
                </select>
            </div>
        </div>
    </div>

    <div class="row">
        <div class="col-md-9">
            <div class="form-group">
                <label for="nome">Nome *</label>
                <input type="text" class="form-control" name="nome" value="{{isset($subitem) ? $subitem->nome : old('nome')}}" required>
            </div>
        </div>
        <div class="col-md-3">
            <div class="form-group">
                <label for="active">Ativo *</label>
                <select name="active" id="active" class="form-control" required>
                    <option value="">Selecione...</option>
                    <option value="1" {{(isset($subitem) && $subitem->active == true) ? 'selected' : old('active')}}>SIM</option>
                    <option value="0" {{(isset($subitem) && $subitem->active == false) ? 'selected' : old('active')}}>NÃO</option>
                </select>
            </div>
        </div>
    </div>

    <hr>
    <a href="{{route('itens.index')}}" class="btn btn-sm btn-secondary"><i class="fas fa-undo-alt"></i> CANCELAR</a>
    <button type="submit" class="btn btn-sm btn-success">{!!(isset($subitem)) ? '<i class="fas fa-sync"></i> ATUALIZAR' : '<i class="fas fa-save"></i> SALVAR'!!}</button>
</form>

@section('scripts')
    <script>
        $('.moduloitem_id').selectpicker();
    </script>
@endsection