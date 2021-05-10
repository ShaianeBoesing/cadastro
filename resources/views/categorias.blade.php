@extends('layout.app', ['current' => 'categorias'])
@section('body')
    <div class="card borders">
        <div class="card-body">
            <h5 class="card-title">Cadastro de Categorias</h5>

            @if(count($cats)>0)
            <table class="table table-ordered table hover">
                <thead>
                <tr>
                    <th>código</th>
                    <th>nome</th>
                    <th>editar</th>
                    <th>excluir</th>
                </tr>
                </thead>
                <tbody>
                @foreach($cats as $cat)
                    <tr>
                        <td>{{$cat->id}}</td>
                        <td>{{$cat->nome}}</td>
                        <td>
                            <a href="/categorias/{{$cat->id}}/edit" class="btn btn-primary">Editar</a>
                        </td>
                        <td>
                            <a href="#" class="btn btn-danger">Excluir</a>
                        </td>
                    </tr>
                @endforeach

                </tbody>
            </table>
            @endif
        </div>
        <div class="card-footer">
            <a href="/categorias/create" class="btn btn-sm btn-primary" role="button">Nova Categoria</a></div>
    </div>


@endsection
