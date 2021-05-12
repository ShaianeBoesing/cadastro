@extends('layout.app', ['current' => 'categorias'])

@section('body')
    <h3>Nova Categoria</h3>
    <div class="card border" >
        <div class="card-body">
            <form action="{{route('categorias.store')}}" method="POST">
                @csrf
                <div class="form-group"><label for="nomeCategoria">Nome</label>
                    <input type="text" class="form-control" name="nomeCategoria" id="nomeCategoria"  placeholder="Informe o nome da categoria">
                    <button type="submit" class="btn btn-primary btn-sm">Salvar</button>
                    <a href="{{route('categorias.index')}}" type="button" class="btn btn-danger btn-sm">Cancelar</a>
                </div>

            </form>
        </div>
    </div>
@endsection

