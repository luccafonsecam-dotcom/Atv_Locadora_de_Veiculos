<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <title>Editar Aluguel</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css">
</head>
<body>
<div class="container mt-4">

    <h2>Editar Aluguel</h2>

    <form method="POST" action="{{ route('alugueis.update', $aluguel->id) }}">
        @csrf
        @method('PUT')

        <div class="mb-2">
            <label>Usuário</label>
            <select name="usuario_id" class="form-control">
                @foreach($usuarios as $u)
                    <option value="{{ $u->id }}" {{ $u->id == $aluguel->usuario_id ? 'selected' : '' }}>
                        {{ $u->name }}
                    </option>
                @endforeach
            </select>
        </div>

        <div class="mb-2">
            <label>Carro</label>
            <select name="carro_id" class="form-control">
                @foreach($carros as $c)
                    <option value="{{ $c->id }}" {{ $c->id == $aluguel->carro_id ? 'selected' : '' }}>
                        {{ $c->modelo }}
                    </option>
                @endforeach
            </select>
        </div>

        <div class="mb-2">
            <label>Data início</label>
            <input type="date" name="data_inicio" value="{{ $aluguel->data_inicio }}" class="form-control">
        </div>

        <div class="mb-2">
            <label>Data final prevista</label>
            <input type="date" name="data_final_prevista" value="{{ $aluguel->data_final_prevista }}" class="form-control">
        </div>

        <button class="btn btn-primary">Atualizar</button>
        <a href="{{ route('alugueis.index') }}" class="btn btn-secondary">Voltar</a>
    </form>

</div>
</body>
</html>