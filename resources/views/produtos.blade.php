@extends('layout.app', ['current' => 'produtos'])
@section('body')
    <div class="card borders">
        <div class="card-body">
            <h5 class="card-title">Cadastro de Produtos</h5>

            @if(count($cats)>0)
                <table class="table table-ordered table-hover">
                    <thead>
                    <tr>
                        <th>código</th>
                        <th>nome</th>
                        <th>estoque</th>
                        <th>preço</th>
                        <th>categoria</th>
                        <th>editar</th>
                        <th>excluir</th>
                    </tr>
                    </thead>
                    <tbody>
                    @foreach($prods as $prod)

                            <tr>
                            <td>{{$prod->id}}</td>
                            <td>{{$prod->nome}}</td>
                            <td>{{$prod->estoque}}</td>
                            <td>{{$prod->preco}}</td>
                            <td>
                            @foreach($cats as $cat)
                                {{($prod->categoria_id == $cat->id?$cat->nome:null) }}
                            @endforeach
                            </>
                            <td>
                                <a href="{{route('produtos.edit', $prod->id)}}" class="btn btn-primary">Editar</a>
                            </td>
                            <form action="{{route('produtos.destroy',$prod->id)}}" method="POST">
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
            <a href="{{route('produtos.create')}}" class="btn btn-sm btn-primary" role="button">Novo Produto</a>
        </div>
    </div>


@endsection
