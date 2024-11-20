<?php

namespace App\Http\Controllers;

use App\Models\Depoimento;
use Illuminate\Http\Request;

class DepoimentoController extends Controller
{
    public function index()
    {
        // Obtendo todos os depoimentos
        $depoimentos = Depoimento::all();
        // Retorna a view com a variável $depoimentos
        return view('admin.depoimentos.index', compact('depoimentos'));
    }

    public function create()
    {
        // Retorna a view para criar um novo depoimento
        return view('admin.depoimentos.create');
    }

    public function store(Request $request)
    {
        // Validação dos campos
        $request->validate([
            'nome' => 'required|string|max:255',
            'relato' => 'required|string',
            'nota' => 'required|integer|between:1,5',
        ], [
            'nome.required' => 'O nome é obrigatório.',
            'relato.required' => 'O relato é obrigatório.',
            'nota.required' => 'A nota é obrigatória e deve estar entre 1 e 5.',
        ]);

        // Criando o novo depoimento com os dados validados
        Depoimento::create($request->only(['nome', 'relato', 'nota']));

        // Redireciona de volta para a lista de depoimentos com mensagem de sucesso
        return redirect()->route('depoimentos.index')->with('success', 'Depoimento adicionado.');
    }

    public function edit(Depoimento $depoimento)
    {
        // Retorna a view de edição com o depoimento
        return view('admin.depoimentos.edit', compact('depoimento'));
    }

    public function update(Request $request, Depoimento $depoimento)
    {
        // Validação dos campos
        $request->validate([
            'nome' => 'required|string|max:255',
            'relato' => 'required|string',
            'nota' => 'required|integer|between:1,5',
        ], [
            'nome.required' => 'O nome é obrigatório.',
            'relato.required' => 'O relato é obrigatório.',
            'nota.required' => 'A nota é obrigatória e deve estar entre 1 e 5.',
        ]);

        // Atualizando o depoimento com os dados validados
        $depoimento->update($request->only(['nome', 'relato', 'nota']));

        // Redireciona de volta para a lista de depoimentos com mensagem de sucesso
        return redirect()->route('depoimentos.index')->with('success', 'Depoimento atualizado.');
    }

    public function destroy(Depoimento $depoimento)
    {
        // Excluindo o depoimento
        $depoimento->delete();

        // Redireciona de volta para a lista de depoimentos com mensagem de sucesso
        return redirect()->route('depoimentos.index')->with('success', 'Depoimento removido.');
    }
}
