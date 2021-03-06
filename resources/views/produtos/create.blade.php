@extends('layout.base')

@section('title', 'Adicionar Produto')

@section('content')

    <div class="card">
        <div class="card-header">
            Cadastre seu Produto
        </div>
        <div class="card-body">
            <form action="{{ route('produtos.store') }}" method="POST">
                {{ csrf_field() }}
                <h4 class="card-title">Dados do produto</h4>
                <hr>
                <div class="form-group">
                    <label for="descricao">Descrição</label>
                    <input type="text" class="form-control @error('descricao') is-invalid @enderror" name="descricao">
                    <span class="invalid-feedback"> @error('descricao') {{ $message }} @enderror</span>
                </div>
                <div class="row">
                    <div class="col-md-4">
                        <div class="form-group">
                            <label for="preco">Preço</label>
                            <input type="text" class="form-control @error('preco') is-invalid @enderror " name="preco">
                            <span class="invalid-feedback"> @error('preco') {{ $message }} @enderror</span>
                        </div>
                    </div>

                    <div class="col-md-4">
                        <div class="form-group">
                            <label for="cor">Cor</label>
                            <input type="text" class="form-control @error('cor') is-invalid @enderror" name="cor">
                            <span class="invalid-feedback"> @error('cor') {{ $message }} @enderror </span>
                        </div>
                    </div>

                    <div class="col-md-4">
                        <div class="form-group">
                            <label for="peso">Peso</label>
                            <input type="text" class="form-control @error('peso') is-invalid @enderror" name="peso">
                            <span class="invalid-feedback"> @error('peso') {{ $message }} @enderror</span>
                        </div>
                    </div>
                </div>

                <h4 class="card-title">Marca</h4>
                <hr>
                <div class="form-group">
                    <label for="marca_id">Selecione a Marca do produto</label>
                    <select name="marca_id" id="" class="form-control">
                        @foreach ($marcas as $marca)
                            <option value="{{ $marca->id }}">{{ $marca->nome }}</option>
                        @endforeach
                    </select>
                </div>
                <a href="{{ url()->previous() }}" class="btn btn-light">Voltar</a>
                <button class="btn btn-primary" type="submit">Cadastrar</button>
            </form>
        </div>
    </div>
@endsection

