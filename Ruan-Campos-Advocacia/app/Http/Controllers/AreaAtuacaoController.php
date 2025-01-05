<?php
namespace App\Http\Controllers;

use App\Models\AreaAtuacao;
use Illuminate\Http\Request;

class AreaAtuacaoController extends Controller
{
    public function index()
    {
        $areasAtuacao = AreaAtuacao::all();
        return view('admin.areaatuacao.index', compact('areasAtuacao'));
    }

    public function create()
    {
        return view('admin.areaatuacao.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'titulo' => 'required|string|max:255',
            'descricao' => 'required|string',
        ]);

        AreaAtuacao::create($request->all());
        return redirect()->route('areas-atuacao.index')->with('success', 'Área de atuação criada com sucesso.');
    }

    public function edit(AreaAtuacao $areaAtuacao)
    {
        return view('admin.areaatuacao.edit', compact('areaAtuacao'));
    }

    public function update(Request $request, AreaAtuacao $areaAtuacao)
    {
        $request->validate([
            'titulo' => 'required|string|max:255',
            'descricao' => 'required|string',
        ]);

        $areaAtuacao->update($request->all());
        return redirect()->route('areas-atuacao.index')->with('success', 'Área de atuação atualizada com sucesso.');
    }

    public function destroy(AreaAtuacao $areaAtuacao)
    {
        $areaAtuacao->delete();ç
        return redirect()->route('areas-atuacao.index')->with('success', 'Área de atuação excluída com sucesso.');
    }
}