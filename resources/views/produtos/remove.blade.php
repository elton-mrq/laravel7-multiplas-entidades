@extends('layout.base')

@section('title', 'Remover Produto')

@section('content')

    <div class="card">
        <div class="card-header">Remover o Produto</div>
        <div class="card-body">
            <form action="{{ route('produtos.destroy', $produto->id) }}" method="POST">
                {{ csrf_field() }}
                <input type="hidden" name="_method" value="DELETE">
                <div class="row">
                    <div class="col-md-12">
                        <h3 class="card-title">Sobre o Produto</h3>
                        <p class="cad-text"><strong>Descrição: </strong>{{ $produto->descricao }}</p>
                        <p class="cad-text"><strong>Preço: </strong>R$ {{ number_format($produto->preco, 2, ',', '.') }}</p>
                        <p class="cad-text"><strong>Cor: </strong>{{ $produto->cor }}</p>
                        <p class="cad-text"><strong>Peso: </strong>{{ $produto->peso }}</p>
                    </div>
                </div>
                <button type="submit" class="btn btn-danger">Remover</button>
                <a href="{{ url()->previous() }}" class="btn btn-light">Voltar</a>
            </form>

        </div>
    </div>
@endsection
