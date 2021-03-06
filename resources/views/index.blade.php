@extends('layout.app', ['current' => 'home'])

@section('body')
    <div class="jumbotron bg-light border border-secondary mt-3">
        <div class="row">
            <div class="card-deck">
                <div class="card border border-primary">
                    <div class="card-body">
                        <h5 class="card-title">
                            Cadastro de Categorias
                        </h5>
                        <p class="card-text">
                            Aqui você cadastra todas as suas novas categorias.
                        </p>
                        <a href="{{route('categorias.index')}}" class="btn btn-primary"> Cadastre suas categorias</a>
                    </div>
                </div>

                <div class="card border border-primary">
                    <div class="card-body">
                        <h5 class="card-title">
                            Cadastro de produtos
                        </h5>
                        <p class="card-text">
                            Aqui você cadastra todos os seus produtos.
                        </p>
                        <a href="{{route('produtos.index')}}" class="btn btn-primary"> Cadastre seus produtos</a>
                    </div>
                </div>

                <div class="card border border-primary">
                    <div class="card-body">
                        <h5 class="card-title">
                            Cadastro de Vendedores
                        </h5>
                        <p class="card-text">
                            Aqui você cadastra todos os novos vendedores.
                        </p>
                        <a href="{{route('produtos.index')}}" class="btn btn-primary"> Cadastre seus vendedores</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
