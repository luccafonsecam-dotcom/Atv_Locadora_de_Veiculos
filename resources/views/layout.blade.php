<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <title>Sistema de Aluguel</title>

    <!-- Bootstrap (pra ficar bonito rápido) -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>

    <!-- 🔝 MENU -->
    <nav class="navbar navbar-expand-lg navbar-dark bg-dark">
        <div class="container">
            <a class="navbar-brand" href="/">Locadora</a>

            <div class="navbar-nav">
                <a class="nav-link" href="{{ route('carros.index') }}">Carros</a>
                <a class="nav-link" href="{{ route('alugueis.index') }}">Aluguéis</a>
            </div>
        </div>
    </nav>

    <!-- 📄 CONTEÚDO DAS PÁGINAS -->
    <div class="container mt-4">
        @yield('content')
    </div>

</body>
</html>