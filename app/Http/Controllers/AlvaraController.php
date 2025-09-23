<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Alvara;
use App\Models\AlvaraHistorico;
use App\Models\Empresa;

class AlvaraController extends Controller
{
    public function index()
    {
        $alvaras = Alvara::with('empresa')->get();
        return view('alvaras.index', compact('alvaras'));
    }

    public function create()
    {
        $empresas = Empresa::all();
        return view('alvaras.create', compact('empresas'));
    }

    public function store(Request $request)
    {
        Alvara::create($request->all());
        return redirect()->route('alvaras.index');
    }

    public function edit(Alvara $alvara)
    {
        $empresas = Empresa::all();
        return view('alvaras.edit', compact('alvara', 'empresas'));
    }

    public function update(Request $request, Alvara $alvara)
    {
        AlvaraHistorico::create([
            'alvara_id' => $alvara->id,
            'empresa_id' => $alvara->empresa_id,
            'numero' => $alvara->numero,
            'data_emissao' => $alvara->data_emissao,
            'data_validade' => $alvara->data_validade,
            'status' => $alvara->status,
            'observacao' => $alvara->observacao,
        ]);

        $alvara->update($request->all());
        return redirect()->route('alvaras.index');
    }

    public function historico(Alvara $alvara)
    {
        $historicos = $alvara->historicos()->with('empresa')->get();
        return view('alvaras.historico', compact('alvara', 'historicos'));
    }
}
