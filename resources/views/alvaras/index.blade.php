@extends('layouts.app')

@section('title', 'Lista de Alvarás')

@section('content')6
<h1>Lista de Alvarás</h1>
<a href="{{ route('alvaras.create') }}" class="btn btn-primary mb-3">Novo Alvará</a>

@if(isset($soon) && $soon->count())
    <div class="alert alert-danger p-3 mb-4">
        <h5 class="mb-2">Atenção — Alvarás próximos do vencimento</h5>
        <p class="mb-2">Os seguintes alvarás vencem em até 7 dias. Verifique e renove se necessário.</p>
        <ul class="mb-0">
            @foreach($soon as $s)
                <li><strong>{{ $s->numero }}</strong> — {{ $s->empresa->nome }} — <span>{{ $s->vencimento_texto }}</span></li>
            @endforeach
        </ul>
    </div>
@endif

<table class="table table-bordered">
    <thead>
        <tr>
            <th>ID</th>
            <th>Número</th>
            <th>Empresa</th>
            <th>Data Emissão</th>
            <th>Data Validade</th>
            <th>Vencimento</th>
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
            <td>
                @php $dias = $alvara->dias_restantes; @endphp
                @if(is_null($dias))
                    —
                @else
                    @if($dias < 0)
                        <span class="badge bg-danger">{{ $alvara->vencimento_texto }}</span>
                    @elseif($dias <= 30)
                        <span class="badge bg-warning text-dark">{{ $alvara->vencimento_texto }}</span>
                    @else
                        <span class="badge bg-success">{{ $alvara->vencimento_texto }}</span>
                    @endif
                @endif
            </td>
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
