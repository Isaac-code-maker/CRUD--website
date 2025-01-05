@extends('admin.dashboard')

@section('content')
    <h1>Editar Área de Atuação</h1>
    <form action="{{ route('areas-atuacao.update', $areaAtuacao->id) }}" method="POST">
        @csrf
        @method('PUT')
        <div>
            <label for="titulo">Título:</label>
            <input type="text" name="titulo" id="titulo" value="{{ $areaAtuacao->titulo }}" required>
        </div>
        <div>
            <label for="descricao">Descrição:</label>
            <textarea name="descricao" id="descricao" required>{{ $areaAtuacao->descricao }}</textarea>
        </div>
        <button type="submit">Salvar</button>
    </form>
@endsection