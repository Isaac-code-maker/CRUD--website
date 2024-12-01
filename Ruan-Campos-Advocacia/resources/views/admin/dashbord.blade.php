<!DOCTYPE html>
<html lang="en">
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
        }
        header {
            background-color: #007bff;
            color: white;
            padding: 1rem;
            text-align: center;
        }
        main {
            padding: 2rem;
            text-align: center;
        }
        form {
            margin-top: 1.5rem;
        }
        button {
            background-color: #dc3545;
            color: white;
            border: none;
            padding: 0.5rem 1rem;
            cursor: pointer;
            border-radius: 5px;
        }
        button:hover {
            background-color: #c82333;
        }
        footer {
            margin-top: 2rem;
            text-align: center;
            font-size: 0.8rem;
            color: #666;
        }
    </style>
</head>
<body>
    <header>
        <h1>Painel Administrativo</h1>
    </header>
    <main>
        <h2>Bem-vindo, {{ auth()->user()->name }}!</h2>
        <p>Você está logado no sistema.</p>
        <form action="{{ route('logout') }}" method="POST">
            @csrf
            <button type="submit">Sair</button>
        </form>
    </main>
    <footer>
        <p>&copy; {{ date('Y') }} - Seu Sistema. Todos os direitos reservados.</p>
    </footer>
</body>
</html>
