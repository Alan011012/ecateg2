@extends('layouts.app')

@section('title', 'Lista de Alvarás')

@section('content')
<h1>Lista de Alvarás</h1>
<a href="{{ route('alvaras.create') }}" class="btn btn-primary mb-3">Novo Alvará</a>

<table class="table table-bordered">
    <thead>
        <tr>
            <th>ID</th>
            <th>Número</th>
            <th>Empresa</th>
            <th>Data Emissão</th>
            <th>Data Validade</th>
            <th>Status</th>
            <th>Ações</th>
        </tr>
    </thead>
    <tbody>
        @foreach($alvaras as $alvara)
        <tr>
            <td>{{ $alvara->id }}</td>
            <td>{{ $alvara->numero }}</td>
            <td>{{ $alvara->empresa->nome }}</td>
            <td>{{ $alvara->data_emissao }}</td>
            <td>{{ $alvara->data_validade }}</td>
            <td>{{ $alvara->status }}</td>
            <td>
                <a href="{{ route('alvaras.edit', $alvara->id) }}" class="btn btn-sm btn-warning">Editar</a>
                <a href="{{ route('alvaras.historico', $alvara->id) }}" class="btn btn-sm btn-info">Histórico</a>
            </td>
        </tr>
        @endforeach
    </tbody>
</table>
@endsection
