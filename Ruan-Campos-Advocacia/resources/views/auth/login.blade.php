<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login</title>
</head>
<body>
    <h1>Login</h1>

    <form action="{{ route('do-login') }}" method="POST">
        @csrf
        @if (session('error'))
            <p style="color: red;">{{ session('error') }}</p>
        @endif

        <label for="email">E-mail:</label>
        <input type="email" name="email" id="email" required>
        <br>
        <label for="password">Senha:</label>
        <input type="password" name="password" id="password" required>
        <br>
        <button type="submit">Entrar</button>
    </form>
</body>
</html>