@extends('layout.base')

@section('title', 'Lista de Produtos')

@section('content')
    <div class="card">
        <div class="card-header">Produtos da Marca</div>
        <div class="card-body">
            <div class="row">
                <div class="col-md-12">
                    <table class="table table-hover">
                        <thead class="thead-dark">
                            <tr>
                                <th scope="col">Nome</th>
                                <th scope="col">Informações</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($marca->produtos as $produto)
                                <tr>
                                    <td>{{ $produto->descricao }}</td>
                                    <td><a href="{{ route('produtos.show', $produto->id) }}">Detalhes do Produto</a></td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
    <br>
    <a href="{{ route('marcas.index') }}" class="btn btn-light">Voltar</a>
@endsection
