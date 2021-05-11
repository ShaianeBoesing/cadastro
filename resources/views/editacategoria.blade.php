@extends('layout.app', ['current' => 'categorias'])

@section('body')
    <h3>Editar Categoria</h3>
    <div class="card border" >
        <div class="card-body">
            <form action="{{route('categorias.update', $cat->id)}}" method="POST">
                @csrf
                @method('PUT')
                <div class="form-group"><label for="nomeCategoria">Nome</label>
                    <input type="text" class="form-control" name="nomeCategoria" id="nomeCategoria" value="{{$cat->nome}}">
                    <button type="submit" class="btn btn-primary btn-sm">Salvar</button>
                    <a href="{{route('categorias.index')}}" type="button" class="btn btn-danger btn-sm">Cancelar</a>
                </div>
            </form>
        </div>
    </div>
@endsection
