@extends('layout.app')

@section('title', 'Canteiros - Funções - Novo')

@section('page-title', 'Canteiros - Funções')

@section('content')

    <div class="row">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">
                    <h3 class="card-title">Edição</h3>
                    <div class="card-tools">
                        <ul class="nav nav-pills ml-auto">
                            {{-- <li class="nav-item">
                                <a href="{{route('canteiros.index')}}" class="nav-link btn btn-secondary text-light">CANCELAR</a>
                            </li> --}}
                        </ul>
                    </div>
                </div>
                <!-- /.card-header -->
                <div class="card-body">
                    @include('funcoes._form')
                </div>
            </div>
        </div>
    </div>

@endsection