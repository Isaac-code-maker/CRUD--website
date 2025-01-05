@extends('admin.dashboard')

@section('content')
    <h1>Gerenciar Áreas de Atuação</h1>
    <a href="{{ route('areas-atuacao.create') }}">Criar Nova Área de Atuação</a>
    <ul>
        @foreach ($areasAtuacao as $areaAtuacao)
            <li>
                {{ $areaAtuacao->titulo }}
                <a href="{{ route('areas-atuacao.edit', $areaAtuacao->id) }}">Editar</a>
                <form action="{{ route('areas-atuacao.destroy', $areaAtuacao->id) }}" method="POST" style="display:inline;">
                    @csrf
                    @method('DELETE')
                    <button type="submit">Excluir</button>
                </form>
            </li>
        @endforeach
    </ul>
@endsection