@extends('admin.dashboard')

@section('content')
    <h1>Editar Depoimento</h1>
    <form action="{{ route('depoimentos.update', $depoimento->id) }}" method="POST">
        @csrf
        @method('PUT')
        <div>
            <label for="nome">Nome:</label>
            <input type="text" name="nome" id="nome" value="{{ $depoimento->nome }}" required>
        </div>
        <div>
            <label for="relato">Relato:</label>
            <textarea name="relato" id="relato" required>{{ $depoimento->relato }}</textarea>
        </div>
        <div>
            <label for="nota">Nota:</label>
            <input type="number" name="nota" id="nota" min="1" max="5" value="{{ $depoimento->nota }}" required>
        </div>
        <button type="submit">Salvar</button>
    </form>
@endsection