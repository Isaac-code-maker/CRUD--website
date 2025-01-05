@extends('admin.dashboard')

@section('content')
    <h1>Gerenciar Depoimentos</h1>
    <a href="{{ route('depoimentos.create') }}">Criar Novo Depoimento</a>
    <ul>
        @foreach ($depoimentos as $depoimento)
            <li>
                {{ $depoimento->nome }} - {{ $depoimento->nota }}/5
                <a href="{{ route('depoimentos.edit', $depoimento->id) }}">Editar</a>
                <form action="{{ route('depoimentos.destroy', $depoimento->id) }}" method="POST" style="display:inline;">
                    @csrf
                    @method('DELETE')
                    <button type="submit">Excluir</button>
                </form>
            </li>
        @endforeach
    </ul>
@endsection