@if($errors->any())
    <div class="alert alert-danger" role="alert">
        <ul class="list">
        @foreach ($errors->all() as $erro)
            <li>{{$erro}}</li>
        @endforeach
        </ul>
    </div>
@endif

@if(isset($canteiro))
    <form action="{{route('construtoras.canteiros.update', [$canteiro->company_id, $canteiro->id])}}" method="POST" enctype="multipart/form-data">
    @method('PUT')
@else
    <form action="{{route('construtoras.canteiros.store', $company->id)}}" method="POST" enctype="multipart/form-data">    
@endif
    @csrf
    
    <input type="hidden" name="company_id" value="{{$company->id}}">
    
    <div class="row">
        <div class="col-md-7">
            <div class="form-group">
                <label for="nome">Nome *</label>
                <input type="text" name="nome" class="form-control" id="nome" value="{{(isset($canteiro)) ? $canteiro->nome : old('nome')}}" required>
            </div>
        </div>
        <div class="col-md-3">
            <div class="form-group">
                <label for="funcionario_id">Gerente</label>
                <select name="funcionario_id" id="funcionario_id" class="form-control" @if(!isset($canteiro)) onchange="funcoes()" @endif>
                    <option value="">Selecione...</option>
                    @forelse ($funcionarios as $item)
                        <option value="{{$item->id}}" {{(isset($canteiro) && ($item->id == $canteiro->funcionario_id)) ? 'selected': ''}}>{{$item->pessoa->nome}}</option>
                    @empty
                        <option value="" class="text-danger">Nenhum registro encontrado</option>
                    @endforelse
                </select>
            </div>
        </div>
        <div class="col-md-2">
            <div class="form-group">   
                <label for="estado">Estado *</label>
                <select name="estado" id="estado" class="form-control" required>
                    <option value="">Selecione...</option>
                    <option value="1" {{((isset($canteiro) && $canteiro->estado == 1) ? 'selected' : '')}} {{((old('estado')) && (old('estado') == 1)) ? 'selected' : ''}}>Em andamento</option>
                    <option value="2" {{((isset($canteiro) && $canteiro->estado == 2) ? 'selected' : '')}} {{(old('estado') == 2) ? 'selected' : ''}}>Concluída</option>
                    <option value="3" {{((isset($canteiro) && $canteiro->estado == 3) ? 'selected' : '')}} {{(old('estado') == 3) ? 'selected' : ''}}>Inativa</option>
                </select>
            </div>
        </div>
    </div>
    
    <div class="row">
        <div class="col-md-3">
            <div class="form-group">
                <label for="data_inicio">Data de início</label>
                <input type="date" name="data_inicio" class="form-control" id="data_inicio" value="{{(isset($canteiro)) ? $canteiro->data_inicio : old('data_inicio')}}">
            </div>
        </div>

        <div class="col-md-3">
            <div class="form-group">
                <label for="data_termino">Data de término</label>
                <input type="date" name="data_termino" class="form-control" id="data_termino" value="{{(isset($canteiro)) ? $canteiro->data_termino : old('data_termino')}}">
            </div>
        </div>
    </div>
    {{-- <div class="row">
        <div class="col-md-4">
            <div class="form-group">
                <label for="sabado">Considerar sábados como dias produtivos? *</label>
                <select name="sabado" id="sabado" class="form-control" required>
                    <option value="">Selecione...</option>
                    <option value="0" {{((isset($canteiro) && $canteiro->sabado == 0) ? 'selected' : '')}} {{((old('sabado')) && (old('sabado') == 0)) ? 'selected' : ''}}>NÃO</option>
                    <option value="1" {{((isset($canteiro) && $canteiro->sabado == 1) ? 'selected' : '')}} {{((old('sabado')) && (old('sabado') == 1)) ? 'selected' : ''}}>SIM</option>
                </select>
            </div>
        </div>

        <div class="col-md-4">
            <div class="form-group">
                <label for="domingo">Considerar domingos como dias produtivos? *</label>
                <select name="domingo" id="domingo" class="form-control" required>
                    <option value="">Selecione...</option>
                    <option value="0" {{((isset($canteiro) && $canteiro->domingo == 0) ? 'selected' : '')}} {{((old('domingo')) && (old('domingo') == 0)) ? 'selected' : ''}}>NÃO</option>
                    <option value="1" {{((isset($canteiro) && $canteiro->domingo == 1) ? 'selected' : '')}} {{((old('domingo')) && (old('domingo') == 1)) ? 'selected' : ''}}>SIM</option>
                </select>
            </div>
        </div>

        <div class="col-md-4">
            <div class="form-group">
                <label for="descanso">considerar descanso remunerado? *</label>
                <select name="descanso" id="descanso" class="form-control" required>
                    <option value="">Selecione...</option>
                    <option value="0" {{((isset($canteiro) && $canteiro->descanso == 0) ? 'selected' : '')}} {{((old('descanso')) && (old('descanso') == 0)) ? 'selected' : ''}}>NÃO</option>
                    <option value="1" {{((isset($canteiro) && $canteiro->descanso == 1) ? 'selected' : '')}} {{((old('descanso')) && (old('descanso') == 1)) ? 'selected' : ''}}>SIM</option>
                </select>
            </div>
        </div>
    </div> --}}

    <div class="row">
        <div class="col-md-6">
            <div class="form-group">   
                <label for="logotipo">Logotipo</label>
                <input type="file" name="logotipo" class="form-control" id="logotipo" value="{{old('logotipo')}}">
                <small class="text-info">Formatos permitidos: .jpeg, .png, .jpg, .gif, .svg.</small>
                @if (isset($canteiro) && ($canteiro->logotipo))
                    <br>
                    @if($canteiro->logo_origem == 'g')
                        <img src="{{Storage::url($canteiro->logotipo)}}" width="250">
                    @elseif($canteiro->logo_origem == 'c')
                        <img class="img-fluid" src="{{env('APP_URL_CLIENTE')}}/storage/{{str_replace('public', '',$canteiro->logotipo)}}" width="250" alt="{{mb_strtoupper($canteiro->nome)}}" title="{{mb_strtoupper($canteiro->nome)}}">
                    @endif
                    
                    <br><br>
                    <div class="custom-control custom-checkbox">
                        <input class="custom-control-input custom-control-input-danger" type="checkbox" id="remover_logotipo" name="remover_logotipo">
                        <label for="remover_logotipo" class="custom-control-label text-danger">Remover logotipo</label>
                    </div>
                @endif
            </div>
        </div>
    </div>

    <h5 class="mt-3"><em><i class="fas fa-plus"></i> DADOS COMPLEMENTARES</em></h5>
    <hr>
    <div class="row">
        <div class="col-md-3">
            <div class="form-group">
                <label for="total_unidades">Unidades Habitacionais *</label>
                <input type="text" name="total_unidades" class="form-control" id="total_unidades" value="{{(isset($canteiro)) ? $canteiro->total_unidades : old('total_unidades')}}" required>
            </div>
        </div>

        <div class="col-md-2">
            <div class="form-group">
                <label for="total_funcionarios">Funcionários *</label>
                <input type="text" name="total_funcionarios" class="form-control" id="total_funcionarios" value="{{(isset($canteiro)) ? $canteiro->total_funcionarios : old('total_funcionarios')}}" required>
            </div>
        </div>

        <div class="col-md-3">
            <div class="form-group">
                <label for="limite_armazenamento">Limite de armazenamento * <span class='text-danger'>(mb)</span></label>
                <input type="text" name="limite_armazenamento" class="form-control" id="limite_armazenamento" value="{{(isset($canteiro)) ? $canteiro->limite_armazenamento : old('limite_armazenamento')}}" required>
            </div>
        </div>

        <!-- Transferir este campo para a construtora/company -->
        <!-- <div class="col-md-2">
            <div class="form-group">
                <label for="tamanho_anexo">Tamanho do anexo *</label>
                <input type="text" name="tamanho_anexo" class="form-control" id="tamanho_anexo" value="{{(isset($row)) ? $row->tamanho_anexo : old('tamanho_anexo')}}" required>
            </div>
        </div> -->
    </div>

    <h5 class="mt-3"><em><i class="fas fa-map-marked-alt"></i> DADOS DE ENDEREÇO</em></h5>
    <hr>
    <div class="row">
        <div class="col-md-2">
            <div class="form-group">
                <label for="cep">CEP *</label>
                <input type="text" name="cep" class="form-control" id="cep" value="{{(isset($canteiro)) ? $canteiro->cep : old('cep')}}" required>
            </div>
        </div>

        <div class="col-md-5">
            <div class="form-group">
                <label for="logradouro">Logradouro *</label>
                <input type="text" name="logradouro" class="form-control" id="logradouro" value="{{(isset($canteiro)) ? $canteiro->logradouro : old('logradouro')}}" required>
            </div>
        </div>

        <div class="col-md-2">
            <div class="form-group">
                <label for="numero">Número *</label>
                <input type="text" name="numero" class="form-control" id="numero" value="{{(isset($canteiro)) ? $canteiro->numero : old('numero')}}" required>
            </div>
        </div>

        <div class="col-md-3">
            <div class="form-group">
                <label for="complemento">Complemento</label>
                <input type="text" name="complemento" class="form-control" value="{{(isset($canteiro)) ? $canteiro->complemento : old('complemento')}}" id="complemento">
            </div>
        </div>
    </div>

    <div class="row">
        <div class="col-md-4">
            <div class="form-group">
                <label for="bairro">Bairro *</label>
                <input type="text" name="bairro" class="form-control" id="bairro" value="{{(isset($canteiro)) ? $canteiro->bairro : old('bairro')}}" required>
            </div>
        </div>

        <div class="col-md-6">
            <div class="form-group">
                <label for="cidade">Cidade *</label>
                <input type="text" name="cidade" class="form-control" id="cidade" value="{{(isset($canteiro)) ? $canteiro->cidade : old('cidade')}}" required>
            </div>
        </div>

        <div class="col-md-2">
            <div class="form-group">
                <label for="uf">UF *</label>
                <select name="uf" id="uf" class="form-control" required>
                    <option value="">Selecione...</option>
                    @foreach ($estados as $item)
                        <option value="{{$item->uf}}" {{(isset($canteiro) && $canteiro->uf == $item->uf) ? 'selected' : ''}} {{(old('uf') == $item->uf) ? 'selected' : ''}}>{{$item->uf}}</option>
                    @endforeach
                </select>
            </div>
        </div>
    </div>

    <h5 class="mt-3"><em><i class="fas fa-address-book"></i> DADOS DE CONTATO</em></h5>
    <hr>
    <div class="row">
        <div class="col-md-4">
            <div class="form-group">
                <label for="email">Email *</label>
                <input type="email" name="email" class="form-control" id="email" value="{{(isset($canteiro)) ? $canteiro->email : old('email')}}" required>
            </div>
        </div>

        <div class="col-md-4">
            <div class="form-group">
                <label for="telefone">Telefone *</label>
                <input type="text" name="telefone" class="form-control" id="telefone" value="{{(isset($canteiro)) ? $canteiro->telefone : old('telefone')}}" required>
            </div>
        </div>
    </div>
    @if(!isset($canteiro))
        <h5 class="mt-3"><em><i class="far fa-clock"></i> ÍNDICES DE HORAS EXTRAS</em></h5>
        <hr>
        <div class="row">
            <div class="col-md-3">
                <div class="form-gruop">
                    <label for="">Dias produtivos *</label>
                    <input type="number" min="1" max="5" step="0.01" name="indice_produtivo" class="form-control" class="indice_produtivo" id="indice_produtivo" value="{{old('indice_produtivo')}}" required>
                </div>
            </div>

            <div class="col-md-3">
                <div class="form-gruop">
                    <label for="">Dias improdutivos *</label>
                    <input type="number" min="1" max="5" step="0.01" name="indice_improdutivo" class="form-control" class="indice_improdutivo" id="indice_improdutivo" value="{{old('indice_improdutivo')}}" required>
                </div>
            </div>

            <div class="col-md-3">
                <div class="form-gruop">
                    <label for="">Feriados *</label>
                    <input type="number" min="1" max="5" step="0.01" name="indice_feriado" class="form-control" class="indice_feriado" id="indice_feriado" value="{{old('indice_feriado')}}" required>
                </div>
            </div>
        </div>
    @endif
    
    {{-- <div class="card">
        <div class="card-header col-md-12">
            <h3 class="card-title col-md-3 offset-md-3">Fatores de horas extras</h3>
            <div class="row justify-content-end mr-3">
                <div class="row justify-content-end">
                    <a href="javascript:void(0)" class="btn btn-sm btn-primary add-fields row justify-content-end"><i class="fas fa-plus"></i> ADICIONAR NOVO FATOR</a>
                </div>
            </div>
        </div>
        <div class="card-body">
            @if(isset($canteiro))
                <table class="table table-hover table-responsive table-responsive-md">
                    <thead class="bg-info xl-info md-info">
                        <tr>
                            <th>Índice Produtivo</th>
                            <th>Índice Improdutivo</th>
                            <th>Índice Feriado</th>
                            <th>Data Vigente</th>
                            <th>EDITAR</th>
                            <th>APAGAR</th>
                        </tr>
                    </thead>
                    <tbody>
                        @forelse($canteiro->fatores()->orderby('data_vigencia', 'desc')->get() as $item)
                            <tr>
                                <td>
                                    <input type="number" min="1" max="5" step="0.01" name="edicao_indice_produtivo[{{$item->id}}]" class="edicao_indice_produtivo{{$item->id}} form-control" value="{{$item->indice_produtivo}}" readonly>
                                </td>
                                <td>
                                    <input type="number" min="1" max="5" step="0.01" name="edicao_indice_improdutivo[{{$item->id}}]" class="edicao_indice_improdutivo{{$item->id}} form-control" value="{{$item->indice_improdutivo}}" readonly>
                                </td>
                                <td>
                                    <input type="number" min="1" max="5" step="0.01" name="edicao_indice_feriado[{{$item->id}}]" class="edicao_indice_feriado{{$item->id}} form-control" value="{{$item->indice_feriado}}" readonly>
                                </td>

                                <td>
                                    <input type="date" name="edicao_data_vigencia[{{$item->id}}]" class="edicao_data_vigencia{{$item->id}}" value="{{$item->data_vigencia}}" max="{{date('Y-m-d')}}" readonly>
                                    {!!(($item->data_vigencia == $data_vigente) && ($item->data_vigencia)) ? '<span class="badge badge-success">VIGENTE</span>' : ''!!}
                                </td>

                                    {{-- <input type="hidden" name="edicao_data_vigencia[{{$item->id}}]" class="edicao_data_vigencia{{$item->id}} form-control" value="{{date('Y-m-d')}}" max="{{date('Y-m-d')}}" readonly> --}}
                                {{-- @if(!($item->data_vigencia == $canteiro->data_inicio))
                                    <td>
                                        <div class="icheck-primary d-inline ml-2">
                                            <input type="checkbox" value="{{$item->id}}" name="editar_fator[{{$item->id}}]" id="editar-fator-{{$item->id}}" onclick="editarFator(this)">
                                            <label for="editar-fator-{{$item->id}}"></label>
                                        </div>
                                    </td>
                                    <td>
                                        <div class="icheck-danger d-inline ml-2">
                                            <input type="checkbox" value="{{$item->id}}" name="excluir_fator[{{$item->id}}]" id="excluir-fator-{{$item->id}}" onclick="excluirFator(this)"> 
                                            <label for="excluir-fator-{{$item->id}}"></label>
                                        </div>
                                    </td>
                                @endif
                                {{-- <td>{{$item->indice_produtivo}}</td>
                                <td>{{$item->indice_improdutivo}}</td>
                                <td>{{$item->indice_feriado}}</td>
                                <td>
                                    {{date('d/m/Y', strtotime($item->data_vigencia))}} {!!($item->data_vigencia == $data_vigente) ? '<span class="badge badge-success">VIGENTE</span>' : ''!!}
                                </td> --}}
                            {{--</tr>
                        @empty
                        @endforelse
                    </tbody>
                </table>
            @endif
            <hr>
            <div class="fator-wrap">
                <div class="row">
                    <div class="col-md-2">
                        <label for="indice_produtivo">Índice produtivo {{(isset($canteiro)) ? '' : '*'}}</label>
                        <input type="number" min="1" max="5" step="0.01" name="indice_produtivo[]" class="form-control" class="indice_produtivo" id="indice_produtivo" {{(isset($canteiro)) ? '' : 'required'}}>
                    </div>

                    <div class="col-md-2">
                        <label for="indice_improdutivo">Índice improdutivo {{(isset($canteiro)) ? '' : '*'}}</label>
                        <input type="number" min="1" max="5" step="0.01" name="indice_improdutivo[]" class="form-control" class="indice_improdutivo" id="indice_improdutivo" {{(isset($canteiro)) ? '' : 'required'}}>
                    </div>

                    <div class="col-md-2">
                        <label for="indice_feriado">Índice feriado {{(isset($canteiro)) ? '' : '*'}}</label>
                        <input type="number" min="1" max="5" step="0.01" name="indice_feriado[]" class="form-control" class="indice_feriado" id="indice_feriado" {{(isset($canteiro)) ? '' : 'required'}}>
                    </div>

                    <input type="hidden" name="data_vigencia[]" class="form-control" class="data_vigencia" id="data_vigencia" value="{{date('Y-m-d')}}">
                </div>
            </div>
            <hr>
            <div class="row">
                
            </div>
        </div>
    </div> --}}

    <hr>
    <a href="{{route('construtoras.canteiros.index', $company->id)}}" class="btn btn-sm btn-danger"><i class="fas fa-undo-alt"></i> CANCELAR</a>
    <button type="submit" onclick="salvar()" class="btn btn-sm btn-success">{!!(isset($canteiro)) ? '<i class="fas fa-sync"></i> ATUALIZAR' : '<i class="fas fa-save"></i> SALVAR'!!}</button>
</form>


@section('scripts')

    <script>

        // $(document).ready(function(){

        //     $("#data_inicio").on("input", function(){
        //         var textoDigitado = $(this).val();
        //         var inputCusto = $(this).attr("data_vigencia");
        //         $("#"+ inputCusto).val(textoDigitado);
        //     });
        // });

        // $(document).ready(function){
        //     let data_inicio = getElementById('data_inicio').val()
        //     document.getElementById('data_vigencia').value = data_inicio
        //     // $('#data_vigencia').val(data_inicio)   
        // }

        //Adicionando e removendo campos
        $(document).ready(function(){
            var maximo_campos = 99
            var fator_wrap = $('.fator-wrap')
            var adiciona_campos = $('.add-fields')
            var i = 1

            $(adiciona_campos).click(function(e){
                if(i < maximo_campos)
                {
                    $(fator_wrap).append(`
                        <div class="row">
                            <div class="col-md-2">
                                <label for="indice_produtivo">Índice produtivo *</label>
                                <input type="number" min="1" max="5" step="0.01" name="indice_produtivo[]" class="form-control" id="indice_produtivo" required>
                            </div>

                            <div class="col-md-2">
                                <label for="indice_improdutivo">Índice improdutivo *</label>
                                <input type="number" min="1" max="5" step="0.01" name="indice_improdutivo[]" class="form-control" id="indice_improdutivo" required>
                            </div>

                            <div class="col-md-2">
                                <label for="indice_feriado">Índice feriado *</label>
                                <input type="number" min="1" max="5" step="0.01" name="indice_feriado[]" class="form-control" id="indice_feriado" required>
                            </div>

                            <input type="hidden"  name="data_vigencia[]" class="form-control" id="data_vigencia" value="{{date('Y-m-d')}}">
                            
                            <div class="col-md-3 d-flex align-items-center remove-field">
                                <a href="1" class=" text-danger">REMOVER</a>
                            </div>
                        </div>
                    `)
                    i++
                }                
            })

            $(fator_wrap).on("click", ".remove-field", function(e) {
                e.preventDefault();
                $(this).parent('div').remove();
                i--;
            })
        })

        function funcionarios(val)
        {
            let url = "{{url('/')}}/api/company/"+val+"/funcionarios"
            if(val != ''){
                $.ajax({
                    url: url,
                    method: 'GET',
                    success: function(dados){
                        if (dados.length > 0){
                            var option = '<option value="">Selecione...</option>'
                            $.each(dados, function(i, obj){
                                option += '<option value="'+obj.funcionario.id+'">'+obj.nome+'</option>';
                            })
                            $('#funcionario_id').html(option).show();
                        }else{
                            Reset(true);
                            $('.cadastro-hidden').show()
                        }
                    },
                    error: function(){
                        console.log('sem sucesso')
                    }
                })
            }else{
                Reset(false);
                $('.cadastro-hidden').hide()
            }
        }
        
        function Reset(val){
            if(val){
                $('#funcionario_id').empty().append('<option value="" class="text-danger">Nenhum registro encontrado...</option>');
            }else{
                $('.cadastro-hidden').hide()
                $('#funcionario_id').empty().append('<option value="" class="text-danger">Selecione uma construtora...</option>');
            }
        }

        function editarFator(val)
        {
            let canteiro = "{{isset($canteiro) ? $canteiro->id : ''}}"
            if(val.checked)
            {
                let url = "{{url('/')}}/api/canteiros/"+canteiro+"/fatores/"+val.value+"/medicoes"
                if(val != '')
                {
                    $.ajax({
                        url: url,
                        method: 'GET',
                        success: function(dados){
                            if(dados){
                                alert('ALERTA: Não é possível alterar este item. Existem medições relacionadas.')
                                $('#editar-fator-'+val.value).prop("checked", false)
                            }else{
                                $('.edicao_indice_produtivo'+val.value).attr("readonly", false)
                                $('.edicao_indice_improdutivo'+val.value).attr("readonly", false)
                                $('.edicao_indice_feriado'+val.value).attr("readonly", false)
                                $('.edicao_data_vigencia'+val.value).attr("readonly", false)
                            }
                        },
                        error: function(){
                            console.log('Ação indisponível no momento.')
                        }
                    })
                }
            }else{
                $('.edicao_indice_produtivo'+val.value).attr("readonly", true);
                $('.edicao_indice_improdutivo'+val.value).attr("readonly", true);
                $('.edicao_indice_feriado'+val.value).attr("readonly", true);
                $('.edicao_data_vigencia'+val.value).attr("readonly", true);
            }
        }
        
        function excluirFator(val)
        {
            let canteiro = "{{isset($canteiro) ? $canteiro->id : ''}}"
            if(val.checked)
            {
                let url = "{{url('/')}}/api/canteiros/"+canteiro+"/fatores/"+val.value+"/medicoes"
                if(val != '')
                
                {
                    $.ajax({
                        url: url,
                        method: 'GET',
                        success: function(dados){
                            if(dados){
                                alert('ALERTA: Não é possível Deletar este Fator. Existem medições relacionadas.')
                                $('#excluir-fator-'+val.value).prop("checked", false)
                            }else{
                                $confirmacao = confirm('Tem certeza que deseja remover este Fator?');

                                $confirmacao ? window.location.href = "{{url('/')}}/fatores/"+val.value+"/destroy" : $('#excluir-fator-'+val.value).prop("checked", false);
                            }
                        },
                        error: function(){
                            console.log('Ação indisponível no momento.')
                        }
                    })
                }
            }else{
                $confirmacao = confirm('Tem certeza que deseja remover este Fator?');

                if($confirmacao){
                    window.location.href = "{{url('/')}}/fatores/"+val.value+"/destroy"

                }
            }
        }

    </script>
@endsection
