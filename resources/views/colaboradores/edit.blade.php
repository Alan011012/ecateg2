<h1>Editar Colaborador</h1>
<form action="{{ route('colaboradores.update', $colaboradore->id) }}" method="POST">
    @csrf
    @method('PUT')
    <input type="text" name="nome" value="{{ $colaboradore->nome }}"><br>
    <input type="text" name="endereco" value="{{ $colaboradore->endereco }}"><br>
    <input type="text" name="telefone" value="{{ $colaboradore->telefone }}"><br>
    <input type="email" name="email" value="{{ $colaboradore->email }}"><br>
    <input type="text" name="contato_emergencia" value="{{ $colaboradore->contato_emergencia }}"><br>
    <button type="submit">Atualizar</button>
</form>
