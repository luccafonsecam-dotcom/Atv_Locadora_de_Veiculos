<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Aluguel;
use App\Models\Carro;
use App\Models\User;


class AluguelController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
         $alugueis = Aluguel::with(['usuario', 'carro'])->get();
    return view('alugueis.index', compact('alugueis'));
    }

/**
 * Show the form for creating a new resource.
 */
public function create()
{
     $usuarios = User::all();
    $carros = Carro::where('status', 'disponivel')->get();

    return view('alugueis.create', compact('usuarios', 'carros'));
}

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
       $request->validate([
        'usuario_id' => 'required|exists:users,id',
        'carro_id' => 'required|exists:carros,id',
        'data_inicio' => 'required|date',
        'data_final_prevista' => 'required|date|after_or_equal:data_inicio',
    ]);

    $carro = Carro::findOrFail($request->carro_id);

    // Regra: só pode alugar se o carro estiver disponível
    if ($carro->status !== 'disponivel') {
        return redirect()->back()->with('erro', 'Este carro não está disponível.');
    }

    Aluguel::create([
        'usuario_id' => $request->usuario_id,
        'carro_id' => $request->carro_id,
        'data_inicio' => $request->data_inicio,
        'data_final_prevista' => $request->data_final_prevista,
        'status' => 'aberto',
    ]);

    // Regra: ao criar aluguel, carro vira alugado
    $carro->update(['status' => 'alugado']);

    return redirect()->route('alugueis.index')->with('sucesso', 'Aluguel criado com sucesso!'); 
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
