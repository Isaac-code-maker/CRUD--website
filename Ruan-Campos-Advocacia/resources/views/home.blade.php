<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
</head>
<body>
    @extends('layouts.admin')

@section('content')
<h1>Depoimentos</h1>
<a href="{{ route('depoimentos.create') }}">Adicionar Depoimento</a>

<table>
    <thead>
        <tr>
            <th>Nome</th>
            <th>Relato</th>
            <th>Nota</th>
            <th>Ações</th>
        </tr>
    </thead>
    <tbody>
        @foreach ($depoimentos as $depoimento)
        <tr>
            <td>{{ $depoimento->nome }}</td>
            <td>{{ $depoimento->relato }}</td>
            <td>{{ $depoimento->nota }}</td>
            <td>
                <a href="{{ route('depoimentos.edit', $depoimento->id) }}">Editar</a>
                <form action="{{ route('depoimentos.destroy', $depoimento->id) }}" method="POST" style="display:inline-block;">
                    @csrf
                    @method('DELETE')
                    <button type="submit">Excluir</button>
                </form>
            </td>
        </tr>
        @endforeach
    </tbody>
</table>
@endsection

</body>
</html>