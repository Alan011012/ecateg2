@extends('layouts.app')

@section('title', 'Histórico do Alvará')

@section('content')
<h1>Histórico do Alvará #{{ $alvara->numero }}</h1>
<p class="mb-3">
    <a href="{{ route('alvaras.index') }}" class="text-decoration-none no-print">Voltar</a>
    <button id="printHistoricoBtn" class="ms-3 no-print btn btn-sm btn-outline-secondary">Imprimir tabela</button>
</p>

<style>
    /* Formato de impressão específico para histórico */
    @media print {
        body * { visibility: hidden; }
        .printable, .printable * { visibility: visible; }
        .printable { position: absolute; left: 0; top: 0; width: 100%; }
        .no-print { display: none !important; }
        /* limpar bordas para uma impressão mais limpa */
        .printable table { border-collapse: collapse; width: 100%; }
        .printable th, .printable td { border: 1px solid #000; padding: 6px; font-size: 12pt; }
        h1 { font-size: 16pt; }
    }
</style>

<div class="printable">
<table class="table table-bordered">
    <thead>
        <tr>
            <th class="no-print">ID</th>
            <th>Número</th>
            <th>Empresa</th>
            <th>Data Emissão</th>
            <th>Data Validade</th>
            <th>Status</th>
            <th>Observação</th>
            <th>Data Alteração</th>
        </tr>
    </thead>
    <tbody>
        @foreach($historicos as $hist)
        <tr>
            <td class="no-print">{{ $hist->id }}</td>
            <td>{{ $hist->numero }}</td>
            <td>{{ $hist->empresa->nome }}</td>
            <td>{{ $hist->data_emissao }}</td>
            <td>{{ $hist->data_validade }}</td>
            <td>{{ $hist->status }}</td>
            <td>{{ $hist->observacao }}</td>
            <td>{{ $hist->created_at }}</td>
        </tr>
        @endforeach
    </tbody>
</table>
</div>
<script>
    document.getElementById('printHistoricoBtn').addEventListener('click', function(){ window.print(); });
</script>
@endsection
