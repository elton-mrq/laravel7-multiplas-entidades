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
        </div>
    </div>
            <div class="card">
                <div class="card-header">Lista de Produtos </div>
                <div class="card-body">
                    <div class="row">
                        <div class="col-md-12">
                            <div class="float-right">
                                <span></span>
                                <form class="form-inline" action="{{ route('produtos.index', 'buscar') }}" method="GET">
                                  <input class="form-control mr-sm-2" type="search" placeholder="Descrição do Produto" aria-label="Search" name="buscar">
                                  <button class="btn btn-outline-secondary my-2 my-sm-0" type="submit">Buscar</button>
                                </form>
                            </div>
                        </div>
                    </div>
                    <br>
                    <div class="row">
                        <div class="col-md-12">

                            <table class="table table-hover">
                                <thead>
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
                    </div>

                    <div align="center" class="row">

                        <div class="mx-auto">
                            {{$produtos->links()}}
                        </div>

                    </div>

                </div>
            </div>
     <br>
    <a href="{{ route('produtos.create') }}" class="btn btn-primary">Adicionar</a>
@endsection
