<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Aluguel;
use App\Models\Carro;
use App\Models\User;
use Carbon\Carbon;

class AluguelController extends Controller
{
    public function index()
    {
        $alugueis = Aluguel::with(['usuario', 'carro'])->get();
        return view('alugueis.index', compact('alugueis'));
    }

    public function create()
    {
        $usuarios = User::all();
        $carros = Carro::where('status', 'disponivel')->get();

        return view('alugueis.create', compact('usuarios', 'carros'));
    }

    public function store(Request $request)
    {

        dd($request->all());
        $request->validate([
            'usuario_id' => 'required|exists:usuarios,id',
            'carro_id' => 'required|exists:carros,id',
            'data_inicio' => 'required|date',
            'data_final_prevista' => 'required|date|after_or_equal:data_inicio',
        ]);

        $carro = Carro::findOrFail($request->carro_id);

        // só pode alugar se estiver disponível
        if ($carro->status !== 'disponivel') {
            return back()->with('erro', 'Este carro não está disponível.');
        }

        Aluguel::create([
            'usuario_id' => $request->usuario_id,
            'carro_id' => $request->carro_id,
            'data_inicio' => $request->data_inicio,
            'data_final_prevista' => $request->data_final_prevista,
            'status' => 'aberto',
        ]);

        // muda status do carro
        $carro->update([
            'status' => 'alugado'
        ]);

        return redirect()->route('alugueis.index')
            ->with('sucesso', 'Aluguel criado com sucesso!');
    }

    public function destroy(string $id)
    {
        Aluguel::destroy($id);
        return redirect()->route('alugueis.index');
    }

    public function devolver($id)
    {
        $aluguel = Aluguel::findOrFail($id);

        // segurança: só devolve se estiver aberto
        if ($aluguel->status != 'aberto') {
            return back()->with('erro', 'Este aluguel já foi finalizado.');
        }

        // finaliza aluguel
        $aluguel->update([
            'data_final_entregue' => Carbon::now(),
            'status' => 'finalizado'
        ]);

        // carro volta a ficar disponível
        $carro = $aluguel->carro;
        $carro->update([
            'status' => 'disponivel'
        ]);

        return redirect()->route('alugueis.index')
            ->with('sucesso', 'Veículo devolvido com sucesso!');
    }
}