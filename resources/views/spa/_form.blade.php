@if($errors->any())
    <div class="alert alert-danger" role="alert">
        <ul class="list">
        @foreach ($errors->all() as $erro)
            <li>{{$erro}}</li>
        @endforeach
        </ul>
    </div>
@endif

@if(isset($usuario))
    <form action="{{route('usuarios.update', [$usuario->id])}}" method="POST" enctype="multipart/form-data">
    @method('PUT')
@else
    <form action="{{route('usuarios.store')}}" method="POST" enctype="multipart/form-data">
@endif
    @csrf
    <input type="hidden" name="superadmin" value="1">
    <input type="hidden" name="engenharia" value="1">
    <input type="hidden" name="seguranca" value="1">

    <div class="row">
        <div class="col-md-6">
            <div class="form-group">
                <label for="nome">Nome *</label>
                <input type="text" name="nome" class="form-control" id="nome" value="{{(isset($usuario)) ? $usuario->name : old('nome')}}" required>
            </div>
        </div>
        
        <div class="col-md-6">
            <div class="form-group">   
                <label for="telefone">Telefone *</label>
                <input type="telefone" name="telefone" class="form-control" id="telefone" value="{{(isset($usuario)) ? $usuario->telefone : old('telefone')}}" required>
            </div>
        </div>

        {{-- <div class="col-md-6">
            <div class="form-group">   
                <label for="cargo">Cargo *</label>
                <input type="text" name="cargo" class="form-control" id="cargo" value="{{(isset($usuario)) ? $usuario->pessoa->cargo : old('cargo')}}" required>
            </div>
        </div> --}}
        
        <div class="col-md-6">
            <div class="form-group">
                <label for="logotipo">Foto</label>
                {{-- @if(!$canteiro->logotipo)  --}}
                    
                    <input type="file" name="imagem" class="form-control" id="imagem" value="{{old('imagem')}}">
                    <small class="text-info">Formatos permitidos: .jpeg, .png, .jpg, .gif, .svg.</small>
                {{-- @endif --}}
                
                
                @if (isset($usuario) && ($usuario->imagem))
                
                    <br>

                    <div class="img-hidden-after-remove">
                        @if($usuario->imagem)
                            <img class="img-fluid" src="{{env('APP_URL_GESTOR')}}/storage/{{$usuario->imagem}}" width="250" alt="{{mb_strtoupper($usuario->nome)}}" title="{{mb_strtoupper($usuario->nome)}}">
                        @elseif($usuario->imagem_origem == 'c')
                            <img class="img-fluid" src="{{env('APP_URL')}}/storage/{{str_replace('public', '',$usuario->imagem)}}" width="250" alt="{{mb_strtoupper($usuario->nome)}}" title="{{mb_strtoupper($usuario->nome)}}">
                        @endif
                    </div>
                @endif
            </div>
        </div>

        <div class="col-md-4">
            <div class="form-group">
                <label for="email">Email *</label>
                <input type="text" name="email" class="form-control" id="email" value="{{(isset($usuario)) ? $usuario->email : old('email')}}" required>
            </div>
        </div>
    </div>

    <div class="row">
        <div class="col-md-12">
            <div class="custom-control custom-checkbox">
                <input class="custom-control-input custom-control-input-info" type="checkbox" id="enviar_email" name="enviar_email">
                <label for="enviar_email" class="custom-control-label text-info">Deseja enviar o email com a senha?</label>
            </div>
        </div>
    </div>
    
    <hr>
    <a href="{{route('usuarios.index')}}" class="btn btn-sm btn-danger"><i class="fas fa-undo-alt"></i> CANCELAR</a>
    <button type="submit" class="btn btn-sm btn-success">{!!(isset($usuario)) ? '<i class="fas fa-sync"></i> ATUALIZAR' : '<i class="fas fa-save"></i> SALVAR'!!}</button>
</form>