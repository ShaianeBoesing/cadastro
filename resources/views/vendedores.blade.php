@extends('layout.app', ['current' => 'vendedores'])
@extends('novovendedor')
@section('body')

    <div class="card borders">
        <div class="card-body">
            <h5 class="card-title">Cadastro de Vendedores</h5>

                <table class="table table-ordered table-hover" id="tabelVendedores">
                    <thead>
                    <tr>
                        <th>#</th>
                        <th>Nome</th>
                        <th>CPF</th>
                        <th>Email</th>
                        <th>Categoria</th>
                        <th>Editar</th>
                        <th>Excluir</th>
                    </tr>
                    </thead>
                    <tbody>

                    </tbody>
                </table>
        </div>
        <div class="card-footer">
            <button class="btn btn-sm btn-primary" role="button" onclick="novoVendedor()" >Novo Vendedor</button>
            {{--É possível usar data-toggle="modal" data-target="#dlgVendedores" ao invés do onClick='novoVendedor()' --}}
        </div>
    </div>
@endsection

{{--JAVASCRIPT--}}

@section('javascript')
    <script>
        $(document).ready(function(){
            carregarVendedores();
            carregarCategorias();
        });

        $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': "{{csrf_token()}}"
            }
        });

        function montarLinha(p) {
            var linha = '<tr>' +
                '<td>' + p.id+ '</td>' +
                '<td>' + p.nome + '</td>' +
                '<td>' + p.cpf + '</td>' +
                '<td>' + p.email + '</td>' +
                '<td>' + p.categoria_id + '</td>' +
                '<td>' + '<button class="btn btn-sm btn-primary"> Editar </button>' + '</td>' +
                '<td>' + '<button class="btn btn-sm btn-danger"> Apagar </button>' + '</td>' +
                '</tr>';

            return linha;
        }

        function carregarVendedores() {
            $.getJSON('/api/vendedores', function (vendedores) {
                for(var i=0;i<vendedores.length;i++){
                    var linha = montarLinha(vendedores[i]);
                    $('#tabelVendedores').append(linha);
                }
            });
        }

        function novoVendedor() {
            $('#nome').val('');
            $('#cpf').val('');
            $('#email').val('');
            $('#dlgVendedores').modal('show');
        }

        function carregarCategorias()
        {
            $.getJSON('/api/categorias', function(data)
            {
                console.log(data);
                for(var i=0;i<data.length;i++)
                {
                    opcao = '<option value=' + data[i]. id +'>' + data[i]. nome +  '</option>';
                    $('#categoria').append(opcao);
                }
            });
        }

        function criarVendedor() {
            vendedor = {
                nome: $('#nome').val(),
                cpf: $('#cpf').val(),
                email: $('#email').val(),
                categoria_id: $('#categoria').val()
            }


            $.post('/api/vendedores', vendedor, function (data) {
                console.log(data);

            });

        }

        $('#formVendedor').submit(function (event) {
            event.preventDefault();
            criarVendedor();
            $('#dlgVendedores').modal('hide');
        });
    </script>
@endsection

