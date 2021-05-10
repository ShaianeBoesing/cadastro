@extends('layout.app', ['current' => 'home'])

@section('body')
    <div class="jumbotron bg-light border border-secondary mt-3">
        <div class="row">
            <div class="card-deck">
                <div class="card border border-primary">
                    <div class="card-body">
                        <h5 class="card-title">
                            Cadastro de departamentos
                        </h5>
                        <p class="card-text">
                            Aqui você cadastra os seus departamentos.
                        </p>
                        <a href="{{route('produtos')}}" class="btn btn-primary"> Cadastre seus produtos</a>
                    </div>
                </div>

                <div class="card border border-primary">
                    <div class="card-body">
                        <h5 class="card-title">
                            Cadastro de produtos
                        </h5>
                        <p class="card-text">
                            Aqui você cadastra todos os seus produtos. Mas lembre-se de cadastrar antes as categorias
                        </p>
                        <a href="{{route('categorias')}}" class="btn btn-primary"> Cadastre seus produtos</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
