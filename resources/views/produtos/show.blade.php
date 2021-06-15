@extends('layout.base')

@section('title', 'Detalhe Produto')

@section('content')

    <div class="card">
        <div class="card-header">Detalhes do Produto</div>
        <div class="card-body">
            <h3 class="card-title">Sobre o Produto</h3>
            <p class="cad-text"><strong>Descrição: </strong>{{ $produto->descricao }}</p>
            <p class="cad-text"><strong>Preço: </strong>R$ {{ number_format($produto->preco, 2, ',', '.') }}</p>
            <p class="cad-text"><strong>Cor: </strong>{{ $produto->cor }}</p>
            <p class="cad-text"><strong>Peso: </strong>{{ $produto->peso }}</p>
        </div>
    </div>
    <br>
    <a href="{{ url()->previous() }}" class="btn btn-light">Voltar</a>
@endsection
