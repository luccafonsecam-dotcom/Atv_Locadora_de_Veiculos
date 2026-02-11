@extends('layout')

@section('content')

<h1>Novo Usuário</h1>

<form method="POST" action="{{ route('usuarios.store') }}">
@csrf

<input name="name" placeholder="Nome" class="form-control mb-2">
<input name="email" placeholder="Email" class="form-control mb-2">
<input name="password" type="password" placeholder="Senha" class="form-control mb-2">

<select name="status" class="form-control mb-2">
    <option value="ativo">Ativo</option>
    <option value="inativo">Inativo</option>
</select>

<button class="btn btn-success">Salvar</button>
<a href="{{ route('usuarios.index') }}" class="btn btn-secondary">Voltar</a>

</form>

@endsection