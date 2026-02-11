<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <title>Novo Aluguel</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css">
</head>
<body>
<div class="container mt-4">

    <h2>Novo Aluguel</h2>

    <form method="POST" action="{{ route('alugueis.store') }}">
        @csrf

        <div class="mb-2">
            <label>Usuário</label>
            <select name="usuario_id" class="form-control">
                @foreach($usuarios as $u)
                    <option value="{{ $u->id }}">{{ $u->name }}</option>
                @endforeach
            </select>
        </div>

        <div class="mb-2">
            <label>Carro</label>
            <select name="carro_id" class="form-control">
                @foreach($carros as $c)
                    <option value="{{ $c->id }}">{{ $c->modelo }}</option>
                @endforeach
            </select>
        </div>

        <div class="mb-2">
            <label>Data início</label>
            <input type="date" name="data_inicio" class="form-control">
        </div>

        <div class="mb-2">
            <label>Data final prevista</label>
            <input type="date" name="data_final_prevista" class="form-control">
        </div>

        <button class="btn btn-success">Salvar</button>
        <a href="{{ route('alugueis.index') }}" class="btn btn-secondary">Voltar</a>
    </form>

</div>
</body>
</html>