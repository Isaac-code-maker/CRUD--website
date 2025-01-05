<?php

namespace App\Http\Controllers;

use App\Models\SobreMim;
use Illuminate\Http\Request;

class SobreMimController extends Controller
{
    public function index()
    {
        $sobre = SobreMim::first(); 
        return view('admin.sobre.index', compact('sobre'));
    }

    public function create()
    {
        return view('admin.sobre.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'conteudo' => 'required|string',
        ]);

        SobreMim::create($request->all());
        return redirect()->route('sobre.index')->with('success', 'Conteúdo criado com sucesso.');
    }

    public function edit(SobreMim $sobreMim)
    {
        return view('admin.sobre.edit', compact('sobreMim'));
    }

    public function update(Request $request, SobreMim $sobreMim)
    {
        $request->validate([
            'conteudo' => 'required|string',
        ]);

        $sobreMim->update($request->all());
        return redirect()->route('sobre.index')->with('success', 'Conteúdo atualizado com sucesso.');
    }
}