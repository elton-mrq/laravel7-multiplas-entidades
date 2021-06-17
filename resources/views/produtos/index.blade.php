@extends('layout.base')

@section('title', 'Lista de Produtos')

@section('content')

    <div class="row">
        <div class="col-md-12">
            @if (session('status'))
                <div class="alert alert-success">
                    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                      </button>
                    {{ session('status') }}
                </div>
            @endif

            <table class="table table-hover">
                <thead class="thead-dark">
                    <tr>
                        <th scope="col">Descrição</th>
                        <th scope="col">Preço</th>
                        <th scope="col">Cor</th>
                        <th scope="col">Marca</th>
                        <th scope="col">Ações</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($produtos as $produto)
                        <tr>
                            <td>{{ $produto->descricao }}</td>
                            <td>{{ 'R$ ' . number_format($produto->preco, "2", ",", ".") }}</td>
                            <td>{{ $produto->cor }}</td>
                            <td>{{ $produto->marca->nome }}</td>
                            <td>
                                <a href="{{ route('produtos.edit', $produto->id) }}"><span class="material-icons">edit</span></i></a>
                                <a href="{{ route('produtos.remover', $produto->id) }}"><span class="material-icons">delete</span></a>
                                <a href="{{ route('produtos.show', $produto->id) }}"><span class="material-icons">info</span></i></a>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
        <div class="col-md-5"></div>
        <div class="col-md-2">{{$produtos->links()}}</div>
        <div class="col-md-5"></div>
    </div>

    <br>
    <a href="{{ route('produtos.create') }}" class="btn btn-primary">Adicionar</a>
@endsection
