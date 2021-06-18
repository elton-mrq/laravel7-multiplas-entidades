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
        </div>
        <div class="col-md-2"></div>
    </div>

    <div class="card">
        <div class="card-header">Lista de Marcas</div>
        <div class="card-body">
            <div class="row">
                <div class="col-md-2"></div>
                <div class="col-md-8">
                    <div class="float-right">
                        <form class="form-inline" action="{{ route('marcas.index', 'buscar') }}" method="GET" >
                            <input class="form-control mr-sm-2" type="search" placeholder="Descrição da Marca" aria-label="Search" name="buscar">
                            <button class="btn btn-outline-secondary my-2 my-sm-0" type="submit">Buscar</button>
                        </form>
                    </div>
                </div>
            </div>
            <br>
            <div class="row">
                <div class="col-md-2"></div>
                <div class="col-md-8">
                    <table class="table table-hover">
                        <thead>
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
                </div>
                <div class="col-md-2"></div>
            </div>
            <div class="row">
                <div class="mx-auto">
                    {{$marcas->links()}}
                </div>
            </div>
        </div>
    </div>
    <br>
    <a href="{{ route('marcas.create') }}" class="btn btn-primary">Adicionar</a>
@endsection
