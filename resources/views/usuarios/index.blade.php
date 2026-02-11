@extends('layout')

@section('content')

<h1 class="mb-3">Usuários</h1>

<a href="{{ route('usuarios.create') }}" class="btn btn-primary mb-3">Novo</a>

<table class="table table-bordered">
    <tr>
        <th>ID</th>
        <th>Nome</th>
        <th>Email</th>
        <th>Status</th>
        <th>Ações</th>
    </tr>

    @foreach ($usuarios as $u)
    <tr>
        <td>{{ $u->id }}</td>
        <td>{{ $u->name }}</td>
        <td>{{ $u->email }}</td>
        <td>{{ $u->status }}</td>
        <td>
            <a href="{{ route('usuarios.edit', $u->id) }}" class="btn btn-warning btn-sm">Editar</a>

            <form action="{{ route('usuarios.destroy', $u->id) }}" method="POST" style="display:inline;">
                @csrf
                @method('DELETE')
                <button class="btn btn-danger btn-sm">Excluir</button>
            </form>
        </td>
    </tr>
    @endforeach

</table>

@endsection