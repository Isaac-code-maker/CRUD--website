<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Painel Administrativo</title>
</head>
<body>
    <header>
        <h1>Painel Administrativo</h1>
        <a href="#" 
           onclick="event.preventDefault(); document.getElementById('logout-form').submit();">
            Logout
        </a>
    </header>

    <main>
        <h2>Bem-vindo ao Painel Administrativo</h2>
        <p>Gerencie seu site aqui.</p>
        <!-- Adicione links ou botões para gerenciar as seções do site -->
        <ul>
            <li><a href="/admin/sobre">Gerenciar Sobre Mim</a></li>
            <li><a href="/admin/depoimentos">Gerenciar Depoimentos</a></li>
            <li><a href="/admin/areas-atuacao">Gerenciar Áreas de Atuação</a></li>
        </ul>

        @yield('content')
    </main>

    <footer>
        <p>&copy; 2024 Painel Administrativo. Todos os direitos reservados.</p>
    </footer>

    <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
        @csrf
    </form>
</body>
</html>