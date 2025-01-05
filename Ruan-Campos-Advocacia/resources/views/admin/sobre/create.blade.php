@extends('admin.dashboard')

@section('content')
    <h1>Criar Sobre Mim</h1>
    <form action="{{ route('sobre.store') }}" method="POST">
        @csrf
        <div>
            <label for="conteudo">Conteúdo:</label>
            <textarea name="conteudo" id="conteudo" required></textarea>
        </div>
        <button type="submit">Salvar</button>
    </form>
@endsection