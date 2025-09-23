@extends('layouts.app')

@section('title', 'Editar Alvará')

@section('content')
<h1>Editar Alvará</h1>

<form action="{{ route('alvaras.update', $alvara->id) }}" method="POST">
    @csrf
    @method('PUT')
    <div class="mb-3">
        <label>Empresa</label>
        <select name="empresa_id" class="form-control">
            @foreach($empresas as $empresa)
                <option value="{{ $empresa->id }}" @if($alvara->empresa_id == $empresa->id) selected @endif>{{ $empresa->nome }}</option>
            @endforeach
        </select>
    </div>
    <div class="mb-3">
        <label>Número</label>
        <input type="text" name="numero" class="form-control" value="{{ $alvara->numero }}" required>
    </div>
    <div class="mb-3">
        <label>Data Emissão</label>
        <input type="date" name="data_emissao" class="form-control" value="{{ $alvara->data_emissao }}" required>
    </div>
    <div class="mb-3">
        <label>Data Validade</label>
        <input type="date" name="data_validade" class="form-control" value="{{ $alvara->data_validade }}" required>
    </div>
    <div class="mb-3">
        <label>Status</label>
        <input type="text" name="status" class="form-control" value="{{ $alvara->status }}" required>
    </div>
    <div class="mb-3">
        <label>Observação</label>
        <textarea name="observacao" class="form-control">{{ $alvara->observacao }}</textarea>
    </div>
    <button type="submit" class="btn btn-success">Atualizar</button>
    <a href="{{ route('alvaras.index') }}" class="btn btn-secondary">Voltar</a>
</form>
@endsection
