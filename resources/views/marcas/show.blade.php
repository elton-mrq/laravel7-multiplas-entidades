@extends('layout.base')

@section('title', 'Detalhe da Marca')

@section('content')

    <div class="row">
        <div class="col-md-2"></div>
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">Detalhes da Marcar</div>
                <div class="card-body">
                    <h3 class="card-title">Sobre a Marca</h3>
                    <hr>
                    <p class="card-text"><strong>Nome: </strong>{{ $marca->nome }}</p>
                </div>
            </div>

        </div>
        <div class="col-md-2"></div>

        <div class="col-md-2"></div>
        <div class="col-md-8">
            <br>
            <a href="{{ url()->previous() }}" class="btn btn-light">Voltar</a>
        </div>
        <div class="col-md-2"></div>
    </div>
@endsection
