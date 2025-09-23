<h1>Lista de Colaboradores</h1>
<a href="{{ route('colaboradores.create') }}">Novo Colaborador</a>
<ul>
@foreach($colaboradores as $colab)
    <li>
        {{ $colab->nome }} - {{ $colab->email }}
        <a href="{{ route('colaboradores.edit', $colab->id) }}">Editar</a>
        <form action="{{ route('colaboradores.destroy', $colab->id) }}" method="POST" style="display:inline">
            @csrf
            @method('DELETE')
            <button type="submit">Excluir</button>
        </form>
    </li>
@endforeach
</ul>
