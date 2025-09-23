<h1>Novo Colaborador</h1>
<form action="{{ route('colaboradores.store') }}" method="POST">
    @csrf
    <input type="text" name="nome" placeholder="Nome"><br>
    <input type="text" name="endereco" placeholder="Endereço"><br>
    <input type="text" name="telefone" placeholder="Telefone"><br>
    <input type="email" name="email" placeholder="Email"><br>
    <input type="text" name="contato_emergencia" placeholder="Contato de Emergência"><br>
    <button type="submit">Salvar</button>
</form>