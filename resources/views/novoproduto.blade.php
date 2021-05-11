@extends('layout.app', ['current' => 'produtos'])

@section('body')
    <h3>Novo Produto</h3>
    <div class="card border" >
        <div class="card-body">
            <form action="{{route('produtos.store')}}" method="POST">
                @csrf
                <div class="form-group">
                    <label for="nomeProduto">Nome</label>
                    <input type="text" class="form-control" name="nomeProduto" id="nomeProduto"  placeholder="Informe o nome do produto">
                    <label for="estoqueProduto">Estoque</label>
                    <input type="number" min="0" class="form-control" name="estoqueProduto" id="estoqueProduto"  placeholder="Informe o estoque do produto">
                    <label for="precoProduto">Preço</label>
                    <input type="number" step="0.01" min="0" class="form-control" name="precoProduto" id="precoProduto"  placeholder="Informe o preço do produto">
                    <label for="nomeCategoria">Categoria</label>
                    <select class="form-select form-select-lg mb-3 form-control" name="categoriaProduto" id='categoriaProduto'>
                        <option selected>Selecione a Categoria</option>
                        @foreach($cats as $cat)
                        <option value="{{$cat->id}}">{{$cat->nome}}</option>
                        @endforeach
                    </select>
                    <button type="submit" class="btn btn-primary btn-sm">Salvar</button>
                    <a href="{{route('produtos.index')}}" type="button" class="btn btn-danger btn-sm">Cancelar</a>
                </div>

            </form>
        </div>
    </div>
@endsection
