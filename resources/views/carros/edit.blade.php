@extends('layout')

@section('content')

<h1 class="mb-3">Editar Carro</h1>

@if ($errors->any())
    <div class="alert alert-danger">
        <ul class="mb-0">
            @foreach ($errors->all() as $erro)
                <li>{{ $erro }}</li>
            @endforeach
        </ul>
    </div>
@endif

<form method="POST" action="{{ route('carros.update', $carro->id) }}">
    @csrf
    @method('PUT')

    <input name="modelo" value="{{ $carro->modelo }}" class="form-control mb-2">
    <input name="placa" value="{{ $carro->placa }}" class="form-control mb-2">
    <input name="marca" value="{{ $carro->marca }}" class="form-control mb-2">
    <input name="ano" type="number" value="{{ $carro->ano }}" class="form-control mb-2">
    <input name="preco_diaria" value="{{ $carro->preco_diaria }}" class="form-control mb-2">

    <textarea name="descricao" class="form-control mb-2">{{ $carro->descricao }}</textarea>

    <select name="status" class="form-control mb-2">
        <option value="disponível" {{ $carro->status == 'disponível' ? 'selected' : '' }}>
            Disponível
        </option>
        <option value="indisponível" {{ $carro->status == 'indisponível' ? 'selected' : '' }}>
            Indisponível
        </option>
    </select>

    <button class="btn btn-primary">Atualizar</button>
    <a href="{{ route('carros.index') }}" class="btn btn-secondary">Voltar</a>
</form>

@endsection