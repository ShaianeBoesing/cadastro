@extends('layout.app', ['current' => 'produtos'])

@section('body')
    <h3>Editar Produto</h3>
    <div class="card border" >
        <div class="card-body">
            <form action="{{route('produtos.update', $prods->id)}}" method="POST">
                @csrf
                @method('PUT')
                <div class="form-group">
                    <label for="nomeProduto">Nome</label>
                    <input type="text" class="form-control" name="nomeProduto" id="nomeProduto"  value="{{$prods->nome}}">
                    <label for="estoqueProduto">Estoque</label>
                    <input type="number" min="0" class="form-control" name="estoqueProduto" id="estoqueProduto"  value="{{$prods->estoque}}">
                    <label for="precoProduto">Preço</label>
                    <input type="number" step="0.01" min="0" class="form-control" name="precoProduto" id="precoProduto"   value="{{$prods->preco}}">
                    <label for="nomeCategoria">Categoria</label>
                    <select class="form-select form-select-lg mb-3 form-control" name="categoriaProduto" id='categoriaProduto'>
                        <option>Selecione a Categoria</option>
                        @foreach($cats as $cat)
                            <option value="{{$cat->id}}" {{$cat->id==$prods->categoria_id? 'selected': null}}>{{$cat->nome}} </option>
                        @endforeach
                    </select>
                    <button type="submit" class="btn btn-primary btn-sm">Salvar</button>
                    <a href="{{route('produtos.index')}}" type="button" class="btn btn-danger btn-sm">Cancelar</a>
                </div>
            </form>
        </div>
    </div>
@endsection
