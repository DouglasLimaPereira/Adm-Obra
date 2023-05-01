<div class="modal fade novo-indice" id="staticBackdrop" data-backdrop="static" data-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
    <div class="modal-dialog modal-xl modal-dialog-centered">
        <div class="modal-content">
            <div class="modal-header bg-primary">
                <h5 class="modal-title" id="staticBackdropLabel">Incluir índice</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <form action="{{route('construtoras.indices.store', [$company->id, $canteiro->id])}}" method="POST">
                    @csrf
                    <div class="row border-bottom mb-3">
                        <div class="col-md-12">
                            <p class="text-danger text-right">(*) Preenchimento obrigatório.</p>
                        </div>
                    </div>
                    
                    <div class="row">
                        <div class="col-md-3">
                            <div class="form-gruop">
                                <label for="">Segunda a sexta-feira <span class="text-danger">*</span></label>
                                <input type="number" min="1" max="5" step="0.01" name="indice_produtivo" class="form-control" class="indice_produtivo" id="indice_produtivo" value="{{old('indice_produtivo')}}" required>
                            </div>
                        </div>
            
                        <div class="col-md-3">
                            <div class="form-gruop">
                                <label for="">Sábados e domingos <span class="text-danger">*</span></label>
                                <input type="number" min="1" max="5" step="0.01" name="indice_improdutivo" class="form-control" class="indice_improdutivo" id="indice_improdutivo" value="{{old('indice_improdutivo')}}" required>
                            </div>
                        </div>
            
                        <div class="col-md-3">
                            <div class="form-gruop">
                                <label for="">Feriados <span class="text-danger">*</span></label>
                                <input type="number" min="1" max="5" step="0.01" name="indice_feriado" class="form-control" class="indice_feriado" id="indice_feriado" value="{{old('indice_feriado')}}" required>
                            </div>
                        </div>

                        <div class="col-md-3">
                            <div class="form-gruop">
                                <label for="">Vigência <span class="text-danger">*</span></label>
                                <input type="date" name="data_vigencia" class="form-control" class="data_vigencia" id="data_vigencia" value="{{old('data_vigencia')}}" required>
                            </div>
                        </div>
                    </div>

                    <input type="hidden" name="company_id" value="{{$company->id}}">
                    <input type="hidden" name="canteiro_id" value="{{$canteiro->id}}">
                
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Fechar</button>
                <button type="submit" class="btn btn-success">Incluir</button>
            </div>
            </form>
        </div>
    </div>
</div> 