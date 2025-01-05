@extends('admin.dashboard')

@section('content')
    <h1>Editar Sobre Mim</h1>
    <form action="{{ route('sobre.update', $sobreMim->id) }}" method="POST">
        @csrf
        @method('PUT')
        <div>
            <label for="conteudo">Conteúdo:</label>
            <textarea name="conteudo" id="conteudo" required>{{ $sobreMim->conteudo }}</textarea>
        </div>
        <button type="submit">Salvar</button>
    </form>
@endsection