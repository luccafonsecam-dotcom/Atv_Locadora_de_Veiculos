<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <title>Aluguéis</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css">
</head>
<body>
<div class="container mt-4">

    <h2>Aluguéis</h2>

    <a href="{{ route('alugueis.create') }}" class="btn btn-primary mb-3">
        Novo Aluguel
    </a>

    <table class="table table-bordered">
        <thead>
            <tr>
                <th>Usuário</th>
                <th>Carro</th>
                <th>Início</th>
                <th>Prevista</th>
                <th>Entregue</th>
                <th>Status</th>
                <th width="250">Ações</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($alugueis as $aluguel)
            <tr>
                <td>{{ $aluguel->usuario->name }}</td>
                <td>{{ $aluguel->carro->modelo }}</td>
                <td>{{ $aluguel->data_inicio }}</td>
                <td>{{ $aluguel->data_final_prevista }}</td>
                <td>{{ $aluguel->data_final_entregue ?? '-' }}</td>
                <td>{{ $aluguel->status }}</td>

                <td class="d-flex gap-1">

                    @if($aluguel->status == 'aberto')
                    <form action="{{ route('alugueis.devolver', $aluguel->id) }}" method="POST">
                        @csrf
                        @method('PUT')
                        <button class="btn btn-success btn-sm">
                            Devolver
                        </button>
                    </form>
                    @endif

                    <a href="{{ route('alugueis.edit', $aluguel->id) }}" class="btn btn-warning btn-sm">
                        Editar
                    </a>

                    <form action="{{ route('alugueis.destroy', $aluguel->id) }}" method="POST">
                        @csrf
                        @method('DELETE')
                        <button class="btn btn-danger btn-sm">
                            Excluir
                        </button>
                    </form>

                </td>
            </tr>
            @endforeach
        </tbody>
    </table>

</div>
</body>
</html>