@extends('layout.base')

@section('title', 'Remover Marca')

@section('content')



    <div class="row">
        <div class="col-md-2"></div>
        <div class="col-md-8">

        @if (session('status'))
            <div class="alert alert-danger">
                <button type="button" class="close" data-dismiss="alert" aria-label="close">
                    <span aria-hidden="true">&times;</span>
                </button>
                {{ session('status') }}
            </div>
        @endif

            <div class="card">
                <div class="card-header">Remover Marca</div>
                <div class="card-body">
                    <form action="{{ route('marcas.destroy', $marca->id) }}" method="POST">
                        {{ csrf_field() }}
                        <input type="hidden" name="_method" value="DELETE">
                        <h3 class="card-title">Tem certeza que deseja remover a marca?</h3>
                        <hr>
                        <p class="card-text"><strong>Nome: </strong>{{ $marca->nome }}</p>
                        <br>
                        <a href="{{ route('marcas.index') }}" class="btn btn-light">Voltar</a>
                        <button class="btn btn-danger" type="submit">Remover</button>
                    </form>
                </div>
            </div>
        </div>
        <div class="col-md-2"></div>
    </div>

@endsection
