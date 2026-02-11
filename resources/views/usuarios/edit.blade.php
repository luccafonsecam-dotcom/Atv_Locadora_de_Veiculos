@extends('layout')

@section('content')

<h1>Editar Usuário</h1>

<form method="POST" action="{{ route('usuarios.update', $usuario->id) }}">
@csrf
@method('PUT')

<input name="name" class="form-control mb-2" value="{{ $usuario->name }}">
<input name="email" class="form-control mb-2" value="{{ $usuario->email }}">

<select name="status" class="form-control mb-2">
    <option value="ativo" {{ $usuario->status == 'ativo' ? 'selected' : '' }}>Ativo</option>
    <option value="inativo" {{ $usuario->status == 'inativo' ? 'selected' : '' }}>Inativo</option>
</select>

<button class="btn btn-success">Atualizar</button>
<a href="{{ route('usuarios.index') }}" class="btn btn-secondary">Voltar</a>

</form>

@endsection