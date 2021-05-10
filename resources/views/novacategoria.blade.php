@extends('layout.app', ['current' => 'categorias'])

@section('body')
    <h3>Nova Categoria</h3>
    <div class="card border" >
        <div class="card-body">
            <form action="/categorias" method="POST">
                @csrf 
                <div class="form-group"><label for="nomeCategoria">Nome</label>
                    <input type="text" class="form-control" name="nomeCategoria" id="nomeCategoria" placeholder="Informe seu nome">
                    <button type="submit" class="btn btn-primary btn-sm">Salvar</button>
                    <button type="submit" class="btn btn-danger btn-sm">Cancelar</button>
                </div>

            </form>
        </div>
    </div>
@endsection
