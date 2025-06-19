@extends('adminlte::page')

@section('content')
    <h3>Pedidos criados</h3>
    <table class="table table-bordered">
        <thead>
            <tr>
                <th>ID do pedido</th>
                <th>Usuário</th>
                <th>Vendedor</th>
                <th>Itens</th>
            </tr>
        </thead>
        <tbody>
            @foreach($pedidos as $pedido)
                <tr>
                    <td>{{ $pedido->id }}</td>
                    <td>{{ $pedido->usuario->nome ?? 'desconhecido' }}</td>
                    <td>{{ $pedido->vendedor->nome ?? 'desconhecido' }}</td>
                    <td>
                        <table class="table table-sm">
                            <thead>
                                <tr>
                                    <th>Jogo</th>
                                    <th>Console</th>
                                    <th>Figura</th>
                                </tr>
                            </thead>
                            <tbody>
                                @php
                                    $max = max(
                                        $pedido->jogos->count(),
                                        $pedido->consoles->count(),
                                        $pedido->figuras->count()
                                    );
                                @endphp

                                @for($i = 0; $i < $max; $i++)
                                    <tr>
                                        <td>
                                            {{ $pedido->jogos[$i]->titulo ?? '-' }} 
                                            @if(isset($pedido->jogos[$i]))
                                                (Qtd: {{ $pedido->jogos[$i]->pivot->quantidade }})
                                            @endif
                                        </td>
                                        <td>
                                            {{ $pedido->consoles[$i]->nome ?? '-' }}
                                            @if(isset($pedido->consoles[$i]))
                                                (Qtd: {{ $pedido->consoles[$i]->pivot->quantidade }})
                                            @endif
                                        </td>
                                        <td>
                                            {{ $pedido->figuras[$i]->nome ?? '-' }}
                                            @if(isset($pedido->figuras[$i]))
                                                (Qtd: {{ $pedido->figuras[$i]->pivot->quantidade }})
                                            @endif
                                        </td>
                                    </tr>
                                @endfor

                            </tbody>
                        </table>
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>
@endsection
