@extends('admin.dashboard')

@section('content')
    <h1>Criar Depoimento</h1>
    <form action="{{ route('depoimentos.store') }}" method="POST">
        @csrf
        <div>
            <label for="nome">Nome:</label>
            <input type="text" name="nome" id="nome" required>
        </div>
        <div>
            <label for="relato">Relato:</label>
            <textarea name="relato" id="relato" required></textarea>
        </div>
        <div>
            <label for="nota">Nota:</label>
            <input type="number" name="nota" id="nota" min="1" max="5" required>
        </div>
        <button type="submit">Salvar</button>
    </form>
@endsection