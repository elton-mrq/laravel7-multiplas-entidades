@extends('layout.base')

@section('title', 'Adicionar Produto')

@section('content')

    <div class="card">
        <div class="card-header">
            Cadastre seu Produto
        </div>
        <div class="card-body">
            <form action="{{ route('produtos.update', $produto->id) }}" method="POST">
                {{ csrf_field() }}
                <input type="hidden" name="_method" value="PUT">
                <h4>Dados do produto</h4>
                <hr>
                <div class="form-group">
                    <label for="descricao">Descrição</label>
                    <input type="text" class="form-control @error('descricao') is-invalid @enderror" name="descricao" value="{{$produto->descricao}}">
                    <span class="invalid-feedback"> @error('descricao') {{ $message }} @enderror</span>
                </div>
                <div class="row">
                    <div class="col-md-4">
                        <div class="form-group">
                            <label for="preco">Preço</label>
                            <input type="text" class="form-control @error('preco') is-invalid @enderror " name="preco" value="{{$produto->preco}}">
                            <span class="invalid-feedback"> @error('preco') {{ $message }} @enderror</span>
                        </div>
                    </div>

                    <div class="col-md-4">
                        <div class="form-group">
                            <label for="cor">Cor</label>
                            <input type="text" class="form-control @error('cor') is-invalid @enderror" name="cor" value="{{$produto->cor}}">
                            <span class="invalid-feedback"> @error('cor') {{ $message }} @enderror </span>
                        </div>
                    </div>

                    <div class="col-md-4">
                        <div class="form-group">
                            <label for="peso">Peso</label>
                            <input type="text" class="form-control @error('peso') is-invalid @enderror" name="peso" value="{{$produto->peso}}">
                            <span class="invalid-feedback"> @error('peso') {{ $message }} @enderror</span>
                        </div>
                    </div>
                </div>
                <a href="{{ url()->previous() }}" class="btn btn-light">Voltar</a>
                <button class="btn btn-primary" type="submit">Atualizar</button>
            </form>
        </div>
    </div>
@endsection

