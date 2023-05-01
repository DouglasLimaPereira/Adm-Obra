@extends('layout.app')

@section('title', 'Painel')

@section('page-title', 'Painel de Controle')

@section('content')

    <div class="row">
        <div class="col-lg-3 col-6">
            <div class="small-box bg-info">
                <div class="inner">
                    <h3>{{$construtoras_total}}</h3>
                    <p>Construtoras</p>
                </div>
                <div class="icon">
                    <i class="fas fa-building"></i>
                </div>
                <a href="{{route('construtoras.index')}}" class="small-box-footer">
                    Mais informações <i class="fas fa-arrow-circle-right"></i>
                </a>
            </div>
        </div>
    
        <div class="col-lg-3 col-6">
            <div class="small-box bg-secondary">
                <div class="inner">
                    <h3>{{$admins_total}}</h3>
                    <p>Administradores</p>
                </div>
                <div class="icon">
                    <i class="fas fa-users"></i>
                </div>
                <a href="{{route('usuarios.index')}}" class="small-box-footer">
                    Mais informações <i class="fas fa-arrow-circle-right"></i>
                </a>
            </div>
        </div>
    </div>

@endsection