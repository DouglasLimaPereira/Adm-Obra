@extends('layout.app')

@section('title', 'Módulos - Itens - Subitens')

@section('page-title', 'Módulos - Itens - Subitens')

@section('content')

    <div class="row">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">
                    <h3 class="card-title"><i class="fas fa-edit"></i> Edição</h3>
                    <div class="card-tools">
                        <ul class="nav nav-pills ml-auto">
                            {{-- <li class="nav-item">
                                <a href="{{route('construtoras.index')}}" class="nav-link btn btn-secondary text-light">CANCELAR</a>
                            </li> --}}
                        </ul>
                    </div>
                </div>
                <!-- /.card-header -->
                <div class="card-body">
                    <div class="callout callout-info">
                        <h6>Módulo: {{$modulo->nome}}</h6>
                        <h5>Módulo: {{$item->nome}}</h5>
                    </div>
                    @include('subitens._form')
                </div>
            </div>
        </div>
    </div>

@endsection