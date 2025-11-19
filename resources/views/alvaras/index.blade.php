@extends('layouts.app')

@section('title', 'Lista de Alvarás')

@section('content')
<h1>Lista de Alvarás</h1>
<p class="mb-3"><a href="{{ route('alvaras.create') }}" class="text-decoration-none">Novo Alvará</a></p>
<button id="printTableBtn" class="btn btn-secondary mb-3 ms-2">Imprimir tabela</button>

<style>
    /* Impressão: esconder tudo exceto o conteúdo com classe .printable
       e esconder elementos marcados com .no-print dentro da tabela */
    @media print {
        body * { visibility: hidden; }
        .printable, .printable * { visibility: visible; }
        .printable { position: absolute; left: 0; top: 0; width: 100%; }
        .printable .no-print { display: none !important; }
    }
</style>

@if(isset($soon) && $soon->count())
    <div class="alert alert-danger p-3 mb-4">
        <h5 class="mb-2">Atenção — Alvarás próximos do vencimento</h5>
        <p class="mb-2">Os seguintes alvarás vencem em até 120 dias. Verifique e renove se necessário.</p>
        <ul class="mb-0">
            @foreach($soon as $s)
                <li><strong>{{ $s->numero }}</strong> — {{ $s->empresa->nome }} — <span>{{ $s->vencimento_texto }}</span></li>
            @endforeach
        </ul>
    </div>
@endif

<div class="printable">
<table class="table table-bordered">
    <thead>
        <tr>
            <th class="no-print">ID</th>
            <th>Número</th>
            <th>Empresa</th>
            <th>Data Emissão</th>
            <th>Data Validade</th>
            <th>Vencimento</th>
            <th>Observação</th>
            <th>Status</th>
            <th class="no-print">Ações</th>
        </tr>
    </thead>
    <tbody>
        @foreach($alvaras as $alvara)
        <tr>
            <td class="no-print">{{ $alvara->id }}</td>
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
                        <small class="text-danger">{{ $alvara->vencimento_texto }}</small>
                    @elseif($dias <= 30)
                        <small class="text-warning">{{ $alvara->vencimento_texto }}</small>
                    @else
                        <small class="text-success">{{ $alvara->vencimento_texto }}</small>
                    @endif
                @endif
            </td>
            <td>{{ $alvara->observacao }}</td>
            <td>{{ $alvara->status }}</td>
            <td class="no-print">
                <a href="{{ route('alvaras.edit', $alvara->id) }}" class="text-muted me-2">Editar</a>
                |
                <a href="{{ route('alvaras.historico', $alvara->id) }}" class="text-muted ms-2">Histórico</a>
            </td>
        </tr>
        @endforeach
</table>
</div>

<script>
    document.getElementById('printTableBtn').addEventListener('click', function () {
        window.print();
    });
</script>
@endsection
