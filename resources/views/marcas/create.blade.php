@extends('layout.base')

@section('title', 'Adicionar Marcas')

@section('content')

    <div class="row">
        <div class="col-md-2"></div>
        <div class="col md-8">
            <div class="card">
                <div class="card-header">Casdastre sua Marca</div>
                <div class="card-body">
                    <form action="{{ route('marcas.store') }}" method="POST">
                        {{ csrf_field() }}
                        <h4 class="card-title">Dados da Marca</h4>
                        <hr>
                        <div class="form-group">
                            <label for="nome">Nome</label>
                            <input type="text" class="form-control" name="nome">
                        </div>
                        <a href="{{ url()->previous() }}" class="btn btn-ligth">Voltar</a>
                        <button class="btn btn-success" type="submit">Cadastrar</button>
                    </form>
                </div>
            </div>
        </div>
        <div class="col-md-2"></div>
    </div>

@endsection
