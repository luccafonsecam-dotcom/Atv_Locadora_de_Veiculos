<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Carro;

class CarroController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $carros = Carro::all();
        return view('carros.index', compact('carros'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
         return view('carros.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'modelo' => 'required|string',
            'placa' => 'required|string|unique:carros,placa',
            'marca' => 'required|string',
            'ano' => 'required|integer',
            'preco_diaria' => 'required|numeric',
            'descricao' => 'nullable|string',
        ]);

        Carro::create([
            'modelo' => $request->modelo,
            'placa' => $request->placa,
            'marca' => $request->marca,
            'ano' => $request->ano,
            'preco_diaria' => $request->preco_diaria,
            'descricao' => $request->descricao,
            'status' => 'disponivel', // padrão
        ]);

        return redirect()->route('carros.index')->with('sucesso', 'Carro cadastrado!');
    }

    
    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
         $carro = Carro::findOrFail($id);
        return view('carros.edit', compact('carro'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $carro = Carro::findOrFail($id);

        $request->validate([
            'modelo' => 'required|string',
            'placa' => 'required|string|unique:carros,placa,' . $carro->id,
            'marca' => 'required|string',
            'ano' => 'required|integer',
            'preco_diaria' => 'required|numeric',
            'descricao' => 'nullable|string',
            'status' => 'required|in:disponivel,alugado,manutencao',
        ]);

        // regra simples: não permitir mudar status se estiver alugado
        if ($carro->status === 'alugado') {
            return redirect()->back()->with('erro', 'Carro está alugado.');
        }

        $carro->update($request->all());

        return redirect()->route('carros.index')->with('sucesso', 'Carro atualizado!');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
         $carro = Carro::findOrFail($id);

        if ($carro->status === 'alugado') {
            return redirect()->back()->with('erro', 'Não é possível excluir um carro alugado.');
        }

        $carro->delete();

        return redirect()->route('carros.index')->with('sucesso', 'Carro removido!');
    }
}
