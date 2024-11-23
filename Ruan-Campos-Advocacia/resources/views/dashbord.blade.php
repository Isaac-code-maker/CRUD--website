<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Dashboard</title>
</head>
<body>
    <h1>Bem-vindo ao painel administrativo!</h1>
    <p>Usuário logado: {{ auth()->user()->name }}</p>
    <form action="{{ route('logout') }}" method="POST">
        @csrf
        <button type="submit">Sair</button>
    </form>
</body>
</html>
