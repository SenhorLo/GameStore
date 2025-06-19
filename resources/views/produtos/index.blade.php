@extends('adminlte::page')

@section('content')
<div class="container">
    <h2>Jogos</h2>
    <table class="table">
        <thead>
            <tr>
                <th>Título</th>
                <th>Preço</th>
                <th>Ações</th>
            </tr>
        </thead>
        <tbody>
            @foreach($jogos as $jogo)
            <tr>
                <td>{{ $jogo->titulo }}</td>
                <td>R$ {{ number_format($jogo->preco, 2, ',', '.') }}</td>
                <td>
                    <a href="{{ route('jogos.edit', [$jogo->id]) }}" class="btn-sm btn-success">Editar</a>
                    <form action="{{ route('jogos.destroy', $jogo->id) }}" method="POST" style="display:inline;">
                        @csrf
                        @method('DELETE')
                        <button type="submit" class="btn-sm btn-danger" onclick="return confirm('Tem certeza que deseja remover este item?')">Remover</button>
                    </form>
                </td>
            </tr>
            @endforeach
        </tbody>
    </table>

    <h2>Consoles</h2>
    <table class="table">
        <thead>
            <tr>
                <th>Nome</th>
                <th>Preço</th>
                <th>Ações</th>
            </tr>
        </thead>
        <tbody>
            @foreach($consoles as $console)
            <tr>
                <td>{{ $console->nome }}</td>
                <td>R$ {{ number_format($console->preco, 2, ',', '.') }}</td>
                <td>
                    <a href="{{ route('consoles.edit', [$console->id]) }}" class="btn-sm btn-success">Editar</a>
                    <form action="{{ route('consoles.destroy', $console->id) }}" method="POST" style="display:inline;">
                        @csrf
                        @method('DELETE')
                        <button type="submit" class="btn-sm btn-danger" onclick="return confirm('Tem certeza que deseja remover este item?')">Remover</button>
                    </form>
                </td>
            </tr>
            @endforeach
        </tbody>
    </table>

    <h2>Figuras</h2>
    <table class="table">
        <thead>
            <tr>
                <th>Nome</th>
                <th>Preço</th>
                <th>Ações</th>
            </tr>
        </thead>
        <tbody>
            @foreach($figuras as $figura)
            <tr>
                <td>{{ $figura->nome }}</td>
                <td>R$ {{ number_format($figura->preco, 2, ',', '.') }}</td>
                <td>
                    <a href="{{ route('figuras.edit', [$figura->id]) }}" class="btn-sm btn-success">Editar</a>
                    <form action="{{ route('figuras.destroy', $figura->id) }}" method="POST" style="display:inline;">
                        @csrf
                        @method('DELETE')
                        <button type="submit" class="btn-sm btn-danger" onclick="return confirm('Tem certeza que deseja remover este item?')">Remover</button>
                    </form>
                </td>
            </tr>
            @endforeach
        </tbody>
    </table>
</div>

<script>
function ConfirmaExclusao(tipo, id) {
    if(confirm('Tem certeza que deseja remover este item?')) {
        // Redireciona para a rota de exclusão
        window.location.href = '/' + tipo + '/' + id + '/delete';
    }
    return false;
}
</script>
@endsection