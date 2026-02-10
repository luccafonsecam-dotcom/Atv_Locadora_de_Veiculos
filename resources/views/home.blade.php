@extends('layout')

@section('content')

<h1 class="mb-4">🚗 Sistema da Locadora</h1>

<div class="row">

    <div class="col-md-4">
        <div class="card p-3">
            <h4>Usuários</h4>
            <p>Gerenciar clientes do sistema.</p>
            <a href="{{ route('users.index') }}" class="btn btn-primary">Acessar</a>
        </div>
    </div>

    <div class="col-md-4">
        <div class="card p-3">
            <h4>Carros</h4>
            <p>Cadastro e controle de veículos.</p>
            <a href="{{ route('carros.index') }}" class="btn btn-primary">Acessar</a>
        </div>
    </div>

    <div class="col-md-4">
        <div class="card p-3">
            <h4>Aluguéis</h4>
            <p>Controle de locações.</p>
            <a href="{{ route('alugueis.index') }}" class="btn btn-primary">Acessar</a>
        </div>
    </div>

</div>

@endsection