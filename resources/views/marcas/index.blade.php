@extends('layout.base')

@section('title', 'Lista de Marcas')

@section('content')

    <div class="row">
        <div class="col-md-2"></div>
        <div class="col-md-8">

            @if (session('status'))
                <div class="alert alert-success">
                    <button type="button" class="close" data-dismiss="alert" aria-label="close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                    {{ session('status') }}
                </div>
            @endif

            <table class="table table-hover">
                <thead class="thead-dark">
                    <th scope="col">#</th>
                    <th scope="col">Nome</th>
                    <th scope="col">Produtos</th>
                    <th scope="col">Ações</th>
                </thead>
                <tbody>
                    @foreach ($marcas as $marca)
                        <tr>
                            <td>{{ $marca->id }}</td>
                            <td>{{ $marca->nome }}</td>
                            <td><a href="{{ route('marcas.produtos', $marca->id) }}">Listar Produtos</a></td>
                            <td>
                                <a href="{{ route('marcas.edit', $marca->id) }}"><span class="material-icons">edit</span></a>
                                <a href="{{ route('marcas.remover', $marca->id) }}"><span class="material-icons">delete</span></a>
                                <a href="{{ route('marcas.show', $marca->id) }}"><span class="material-icons">info</span></a>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
            <a href="{{ route('marcas.create') }}" class="btn btn-primary">Adicionar</a>
        </div>
        <div class="col-md-2"></div>
    </div>
@endsection
