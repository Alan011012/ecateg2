@extends('layouts.app')

@section('title', 'Novo Alvará')

@section('content')
<h1>Novo Alvará</h1>

<form action="{{ route('alvaras.store') }}" method="POST">
    @csrf
    <div class="mb-3">
        <label>Empresa</label>
        <select name="empresa_id" class="form-control">
            @foreach($empresas as $empresa)
                <option value="{{ $empresa->id }}">{{ $empresa->nome }}</option>
            @endforeach
        </select>
    </div>
    <div class="mb-3">
        <label>Número</label>
        <input type="text" name="numero" class="form-control" required>
    </div>
    <div class="mb-3">
        <label>Data Emissão</label>
        <input type="date" name="data_emissao" class="form-control" required>
    </div>
    <div class="mb-3">
        <label>Data Validade</label>
        <input type="date" name="data_validade" class="form-control" required>
    </div>
    <div class="mb-3">
        <label>Status</label>
        <input type="text" name="status" class="form-control" required>
    </div>
    <div class="mb-3">
        <label>Observação</label>
        <textarea name="observacao" class="form-control"></textarea>
    </div>
    <button type="submit" class="btn btn-success">Salvar</button>
    <a href="{{ route('alvaras.index') }}" class="btn btn-secondary">Voltar</a>
</form>
@endsection
