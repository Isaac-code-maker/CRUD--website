@extends('admin.dashboard')

@section('content')
    <h1>Criar Área de Atuação</h1>
    <form action="{{ route('areas-atuacao.store') }}" method="POST">
        @csrf
        <div>
            <label for="titulo">Título:</label>
            <input type="text" name="titulo" id="titulo" required>
        </div>
        <div>
            <label for="descricao">Descrição:</label>
            <textarea name="descricao" id="descricao" required></textarea>
        </div>
        <button type="submit">Salvar</button>
    </form>
@endsection