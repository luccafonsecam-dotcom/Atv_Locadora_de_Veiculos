@extends('layout')

@section('content')

<h1 class="mb-3">Carros</h1>

<a href="{{ route('carros.create') }}" class="btn btn-primary mb-3">
    Novo Carro
</a>

@if(session('sucesso'))
    <div class="alert alert-success">
        {{ session('sucesso') }}
    </div>
@endif

@if(session('erro'))
    <div class="alert alert-danger">
        {{ session('erro') }}
    </div>
@endif

<table class="table table-bordered">
    <thead>
        <tr>
            <th>ID</th>
            <th>Modelo</th>
            <th>Marca</th>
            <th>Ano</th>
            <th>Placa</th>
            <th>Diária</th>
            <th>Status</th>
            <th width="150">Ações</th>
        </tr>
    </thead>
    <tbody>
        @forelse($carros as $carro)
        <tr>
            <td>{{ $carro->id }}</td>
            <td>{{ $carro->modelo }}</td>
            <td>{{ $carro->marca }}</td>
            <td>{{ $carro->ano }}</td>
            <td>{{ $carro->placa }}</td>
            <td>R$ {{ $carro->preco_diaria }}</td>
            <td>{{ $carro->status }}</td>
            <td>
                <a href="{{ route('carros.edit', $carro->id) }}" class="btn btn-sm btn-warning">
                    Editar
                </a>

                <form action="{{ route('carros.destroy', $carro->id) }}" method="POST" style="display:inline;">
                    @csrf
                    @method('DELETE')
                    <button class="btn btn-sm btn-danger">
                        Excluir
                    </button>
                </form>
            </td>
        </tr>
        @empty
        <tr>
            <td colspan="8">Nenhum carro cadastrado.</td>
        </tr>
        @endforelse
    </tbody>
</table>

@endsection