@extends('adminlte::page')

@section('content')
    <h3>Vendedores Cadastrados</h3>
    <table class="table">
        <thead>
            <tr>
                <th>Nome</th>
                <th>Email</th>
                <th>Data de Cadastro</th>
            </tr>
        </thead>
        <tbody>
            @foreach($vendedores as $vendedor)
            <tr>
                <td>{{ $vendedor->nome }}</td>
                <td>{{ $vendedor->email }}</td>
                <td>{{ $vendedor->created_at ? $vendedor->created_at->format('d/m/Y H:i') : '' }}</td>
            </tr>
            @endforeach
        </tbody>
    </table>
@endsection