@extends('layout.base')

@section('title', 'Editar Marca')

@section('content')

    <div class="card">
        <div class="card-header">Editar Marca</div>
        <div class="card-body">
            <h3 class="card-title">Sobre a Marca</h3>
            <hr>
            <form action="{{ route('marcas.update', $marca->id) }}" method="post">
                {{ csrf_field() }}
                <input type="hidden" name="_method" value="PUT">
                <div class="form-group">
                    <label for="nome">Nome</label>
                    <input type="text" class="form-control @error('nome') is-invalid @enderror" name="nome" value="{{ $marca->nome }}">
                    <span class="invalid-feedback">@error('nome') {{ $message }} @enderror</span>
                </div>
                <a href="{{ url()->previous() }}" class="btn btn-ligth">Voltar</a>
                <button class="btn btn-primary" type="submit">Atualizar</button>
            </form>
        </div>
    </div>

@endsection
