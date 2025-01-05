@extends('admin.dashboard')

@section('content')
    <h1>Gerenciar Sobre Mim</h1>
    @if ($sobre)
        <p>{{ $sobre->conteudo }}</p>
        <a href="{{ route('sobre.edit', $sobre->id) }}">Editar</a>
    @else
        <p>Nenhum conteúdo encontrado.</p>
        <a href="{{ route('sobre.create') }}">Criar Novo</a>
    @endif
@endsection