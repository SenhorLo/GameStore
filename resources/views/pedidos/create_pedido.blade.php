@extends('adminlte::page')

@section('content')
<h3>Criar novo pedido</h3>

<form method="POST" action="{{ route('pedidos.store') }}">
    @csrf

    <div class="mb-3">
        <label for="id_usuario">Usuário:</label>
        <select name="id_usuario" class="form-control" required>
            @foreach($usuarios as $usuario)
                <option value="{{ $usuario->id }}">{{ $usuario->nome }}</option>
            @endforeach
        </select>
    </div>

    <div class="mb-3">
        <label for="id_vendedor">Vendedor:</label>
        <select name="id_vendedor" class="form-control" required>
            @foreach($vendedores as $vendedor)
                <option value="{{ $vendedor->id }}">{{ $vendedor->nome }}</option>
            @endforeach
        </select>
    </div>

    <hr>

    <h4>Jogos</h4>
    <div class="input-group mb-3">
        <select id="select-jogo" class="form-control">
            <option value="" disabled selected>Selecione um jogo</option>
            @foreach ($jogos as $jogo)
                <option value="{{ $jogo->id }}">{{ $jogo->titulo }}</option>
            @endforeach
        </select>
        <input type="number" id="quantidade-jogo" class="form-control" min="1" value="1" style="max-width:100px;" />
        <button type="button" id="btn-adicionar-jogo" class="btn btn-primary">Adicionar Jogo</button>
    </div>

    <div id="lista-jogos-selecionados" class="mb-4">
    </div>

    <h4>Consoles</h4>
    <div class="input-group mb-3">
        <select id="select-console" class="form-control">
            <option value="" disabled selected>Selecione um console</option>
            @foreach ($consoles as $console)
                <option value="{{ $console->id }}">{{ $console->nome }}</option>
            @endforeach
        </select>
        <input type="number" id="quantidade-filme" class="form-control" min="1" value="1" style="max-width:100px;" />
        <button type="button" id="btn-adicionar-filme" class="btn btn-primary">Adicionar Console</button>
    </div>

    <div id="lista-filmes-selecionados" class="mb-4"></div>

    <h4>Figuras</h4>
    <div class="input-group mb-3">
        <select id="select-figura" class="form-control">
            <option value="" disabled selected>Selecione uma figura</option>
            @foreach ($figuras as $figura)
                <option value="{{ $figura->id }}">{{ $figura->nome }}</option>
            @endforeach
        </select>
        <input type="number" id="quantidade-livro" class="form-control" min="1" value="1" style="max-width:100px;" />
        <button type="button" id="btn-adicionar-livro" class="btn btn-primary">Adicionar figura</button>
    </div>

    <div id="lista-livros-selecionados" class="mb-4"></div>

    <button type="submit" class="btn btn-success">Salvar Pedido</button>
</form>

@endsection

@section('js')
<script>
    document.addEventListener('DOMContentLoaded', function () {
        function adicionarItem(tipo) {
            const select = document.getElementById(`select-${tipo}`);
            const quantidadeInput = document.getElementById(`quantidade-${tipo}`);
            const lista = document.getElementById(`lista-${tipo}s-selecionados`);

            const id = select.value;
            const texto = select.options[select.selectedIndex].text;
            const quantidade = parseInt(quantidadeInput.value);

            if (!id) {
                alert(`Selecione um ${tipo} primeiro.`);
                return;
            }
            if (quantidade < 1) {
                alert('Quantidade deve ser pelo menos 1.');
                return;
            }

            
            if (document.getElementById(`${tipo}-${id}`)) {
                alert(`${texto} já foi adicionado.`);
                return;
            }

            
            const div = document.createElement('div');
            div.classList.add('mb-2');
            div.id = `${tipo}-${id}`;

            
            div.innerHTML = `
                <strong>${texto}</strong> - Quantidade: ${quantidade}
                <button type="button" class="btn btn-sm btn-danger ml-2 btn-remover" data-id="${id}" data-tipo="${tipo}">Remover</button>
                <input type="hidden" name="${tipo}s[${id}]" value="${quantidade}" />
            `;

            lista.appendChild(div);

            select.value = "";
            quantidadeInput.value = 1;
        }
        document.body.addEventListener('click', function(e) {
            if (e.target.classList.contains('btn-remover')) {
                const btn = e.target;
                const id = btn.getAttribute('data-id');
                const tipo = btn.getAttribute('data-tipo');
                const div = document.getElementById(`${tipo}-${id}`);
                if (div) div.remove();
            }
        });


        document.getElementById('btn-adicionar-jogo').addEventListener('click', function() {
            adicionarItem('jogo');
        });
        document.getElementById('btn-adicionar-console').addEventListener('click', function() {
            adicionarItem('console');
        });
        document.getElementById('btn-adicionar-figura').addEventListener('click', function() {
            adicionarItem('figura');
        });
    });
</script>
@endsection
