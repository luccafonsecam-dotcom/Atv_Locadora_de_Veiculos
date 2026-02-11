@extends('layout')

@section('content')

<h1 class="mb-3">Novo Carro</h1>

@if ($errors->any())
    <div class="alert alert-danger">
        <ul class="mb-0">
            @foreach ($errors->all() as $erro)
                <li>{{ $erro }}</li>
            @endforeach
        </ul>
    </div>
@endif

<form method="POST" action="{{ route('carros.store') }}">
    @csrf

    <input name="modelo" placeholder="Modelo" class="form-control mb-2">
    <input name="placa" placeholder="Placa" class="form-control mb-2">
    <input name="marca" placeholder="Marca" class="form-control mb-2">
    <input name="ano" placeholder="Ano" type="number" class="form-control mb-2">
    <input name="preco_diaria" placeholder="Preço da diária" class="form-control mb-2">

    <textarea name="descricao" placeholder="Descrição" class="form-control mb-2"></textarea>

    <button class="btn btn-success">Salvar</button>
    <a href="{{ route('carros.index') }}" class="btn btn-secondary">Voltar</a>
</form>

@endsection