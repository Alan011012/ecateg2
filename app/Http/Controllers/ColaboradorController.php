<?php

namespace App\Http\Controllers;

use App\Models\Colaborador;
use Illuminate\Http\Request;

class ColaboradorController extends Controller
{
    public function index()
    {
        $colaboradores = Colaborador::all();
        return view('colaboradores.index', compact('colaboradores'));
    }

    public function create()
    {
        return view('colaboradores.create');
    }

    public function store(Request $request)
    {
        Colaborador::create($request->all());
        return redirect()->route('colaboradores.index');
    }

    public function edit(Colaborador $colaboradore)
    {
        return view('colaboradores.edit', compact('colaboradore'));
    }

    public function update(Request $request, Colaborador $colaboradore)
    {
        $colaboradore->update($request->all());
        return redirect()->route('colaboradores.index');
    }

    public function destroy(Colaborador $colaboradore)
    {
        $colaboradore->delete();
        return redirect()->route('colaboradores.index');
    }
}