<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Painel Administrativo</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            margin: 0;
            padding: 0;
            background-color: #f4f4f9;
            color: #333;
        }

        header {
            background-color: #007BFF;
            color: white;
            padding: 15px 20px;
            display: flex;
            justify-content: space-between;
            align-items: center;
        }

        header h1 {
            margin: 0;
            font-size: 24px;
        }

        header a {
            color: white;
            text-decoration: none;
            font-size: 16px;
        }

        header a:hover {
            text-decoration: underline;
        }

        main {
            padding: 20px;
        }

        footer {
            margin-top: 20px;
            text-align: center;
            padding: 10px;
            background-color: #007BFF;
            color: white;
        }
    </style>
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
    </main>

    <footer>
        <p>&copy; 2024 Painel Administrativo. Todos os direitos reservados.</p>
    </footer>

    <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
        @csrf
    </form>
</body>
</html>
