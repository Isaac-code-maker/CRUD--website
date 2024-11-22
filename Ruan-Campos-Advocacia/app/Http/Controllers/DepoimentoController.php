<?php

namespace App\Http\Controllers;

use App\Models\Depoimento;
use Illuminate\Http\Request;

class DepoimentoController extends Controller
{
    public function index()
    {
        try {
            // Obtendo todos os depoimentos
            $depoimentos = Depoimento::all();

            // Verifica se há depoimentos antes de enviar para a view
            if ($depoimentos->isEmpty()) {
                return view('admin.depoimentos.index', compact('depoimentos'))
                    ->withErrors(['message' => 'Nenhum depoimento encontrado.']);
            }

            // Retorna a view com a variável $depoimentos
            return view('admin.depoimentos.index', compact('depoimentos'));
        } catch (\Exception $e) {
            // Caso ocorra um erro, redireciona para a página inicial com mensagem de erro
            return redirect()->route('home')->withErrors(['message' => 'Erro ao carregar os depoimentos.']);
        }
    }

    public function create()
    {
        // Retorna a view para criar um novo depoimento
        return view('admin.depoimentos.create');
    }

    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'nome' => 'required|string|max:255',
            'relato' => 'required|string',
            'nota' => 'required|integer|between:1,5',
        ], [
            'nome.required' => 'O nome é obrigatório.',
            'relato.required' => 'O relato é obrigatório.',
            'nota.required' => 'A nota é obrigatória e deve estar entre 1 e 5.',
        ]);

        try {
            // Criando o novo depoimento com os dados validados
            Depoimento::create($validatedData);

            // Redireciona de volta para a lista de depoimentos com mensagem de sucesso
            return redirect()->route('depoimentos.index')->with('success', 'Depoimento adicionado.');
        } catch (\Exception $e) {
            // Caso ocorra um erro, redireciona de volta com mensagem de erro
            return back()->withErrors(['message' => 'Erro ao salvar o depoimento.']);
        }
    }

    public function edit(Depoimento $depoimento)
    {
        return view('admin.depoimentos.edit', compact('depoimento'));
    }

    public function update(Request $request, Depoimento $depoimento)
    {
        $validatedData = $request->validate([
            'nome' => 'required|string|max:255',
            'relato' => 'required|string',
            'nota' => 'required|integer|between:1,5',
        ], [
            'nome.required' => 'O nome é obrigatório.',
            'relato.required' => 'O relato é obrigatório.',
            'nota.required' => 'A nota é obrigatória e deve estar entre 1 e 5.',
        ]);

        try {
            // Atualizando o depoimento com os dados validados
            $depoimento->update($validatedData);

            // Redireciona de volta para a lista de depoimentos com mensagem de sucesso
            return redirect()->route('depoimentos.index')->with('success', 'Depoimento atualizado.');
        } catch (\Exception $e) {
            // Caso ocorra um erro, redireciona de volta com mensagem de erro
            return back()->withErrors(['message' => 'Erro ao atualizar o depoimento.']);
        }
    }

    public function destroy(Depoimento $depoimento)
    {
        try {
            // Excluindo o depoimento
            $depoimento->delete();

            // Redireciona de volta para a lista de depoimentos com mensagem de sucesso
            return redirect()->route('depoimentos.index')->with('success', 'Depoimento removido.');
        } catch (\Exception $e) {
            // Caso ocorra um erro, redireciona de volta com mensagem de erro
            return back()->withErrors(['message' => 'Erro ao remover o depoimento.']);
        }
    }
}
