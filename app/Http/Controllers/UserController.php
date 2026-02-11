<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;

class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     */
   public function index()
{
    $usuarios = User::all();
    return view('usuarios.index', compact('usuarios'));
}

public function create()
{
    return view('usuarios.create');
}

public function store(Request $request)
{
    User::create([
        'name' => $request->name,
        'email' => $request->email,
        'password' => bcrypt($request->password),
        'status' => $request->status
    ]);

    return redirect()->route('usuarios.index');
}

public function edit($id)
{
    $usuario = User::findOrFail($id);
    return view('usuarios.edit', compact('usuario'));
}

public function update(Request $request, $id)
{
    $usuario = User::findOrFail($id);

    $usuario->update([
        'name' => $request->name,
        'email' => $request->email,
        'status' => $request->status
    ]);

    return redirect()->route('usuarios.index');
}

public function destroy($id)
{
    User::destroy($id);
    return redirect()->route('usuarios.index');
}
}
