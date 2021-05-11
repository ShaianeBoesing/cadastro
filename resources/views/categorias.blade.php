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
                            <a href="{{route('categorias.edit', $cat->id)}}" class="btn btn-primary">Editar</a>
                        </td>
                            <form action="{{route('categorias.destroy',$cat->id)}}" method="POST">
                            @csrf
                            @method('DELETE')
                            <td>
                                <input type="submit" class="btn btn-danger" value="Excluir">
                            </td>
                        </form>
                    </tr>
                @endforeach

                </tbody>
            </table>
            @endif
        </div>
        <div class="card-footer">
            <a href="{{route('categorias.create')}}" class="btn btn-sm btn-primary" role="button">Nova Categoria</a>
        </div>
    </div>


@endsection
