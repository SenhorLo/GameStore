@extends('adminlte::page')

@section('content')
    <h3>Editando Jogo: {{ $jogo->titulo }}</h3>

    @if($errors->any())
        <div class="alert alert-danger">
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    {!! Html::form()->action(route('jogos.update', $jogo->id))->method('POST')->open() !!}
        @method('PUT')
        <div class="form-group">
            {!! Html::label('titulo') !!}
            {!! Html::text('titulo', 'titulo')->value($jogo->titulo)->placeholder($jogo->titulo)->required()->class('form-control') !!}
        </div>
        <div class="form-group">
            {!! Html::label('Preço') !!}
            {!! Html::number('preco', 'Preço')->value($jogo->preco)->placeholder($jogo->preco)->attribute('step', '0.01')->required()->class('form-control') !!}
        </div>
        <div class="form-group d-flex justify-content-between">
            {!! Html::submit('Editar')->class('btn btn-primary') !!}
            <button type="reset" class="btn btn-secondary">Limpar</button>
        </div>
    {!! Html::form()->close() !!}

    <a href="{{ url('/produtos') }}" class="btn btn-info">Voltar</a>
@stop