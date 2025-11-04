@extends('layouts.app')

@section('title', 'Histórico do Alvará')

@section('content')
<h1>Histórico do Alvará #{{ $alvara->numero }}</h1>
<a href="{{ route('alvaras.index') }}" class="btn btn-secondary mb-3">Voltar</a>

<table class="table table-bordered">
    <thead>
        <tr>
            <th>ID</th>
            <th>Número</th>
            <th>Empresa</th>
            <th>Data Emissão</th> 
            <th>Data Validade</th>
            <th>Status</th>
            <th>Observação</th>
            <th>Alterado por</th>
            <th>Data Alteração</th>
        </tr>
    </thead>
    <tbody>
        @foreach($historicos as $hist)
        <tr>
            <td>{{ $hist->id }}</td>
            <td>{{ $hist->numero }}</td>
            <td>{{ $hist->empresa->nome }}</td>
            <td>{{ $hist->data_emissao }}</td>
            <td>{{ $hist->data_validade }}</td>
            <td>{{ $hist->status }}</td>
            <td>{{ $hist->observacao }}</td>
            <td>{{ $hist->alterado_por }}</td>
            <td>{{ $hist->created_at }}</td>
        </tr>
        @endforeach
    </tbody>
</table>
@endsection
