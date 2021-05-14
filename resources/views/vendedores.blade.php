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
    //Função inicial, principal

    $(document).ready(function(){
        carregarVendedores();
        carregarCategorias();
    });

    $.ajaxSetup({
        headers: {
            'X-CSRF-TOKEN': "{{csrf_token()}}"
        }
    });

    //estrutura da linha da table
    function montarLinha(p) {
        var linha = '<tr>' +
            '<td>' + p.id+ '</td>' +
            '<td>' + p.nome + '</td>' +
            '<td>' + p.cpf + '</td>' +
            '<td>' + p.email + '</td>' +
            '<td>' + p.categoria_id + '</td>' +
            '<td>' + '<button class="btn btn-sm btn-primary" onclick="editar('+p.id+')"> Editar </button>' + '</td>' +
            '<td>' + '<button class="btn btn-sm btn-danger"  onclick="apagar('+p.id+')"> Apagar </button>' + '</td>' +
            '</tr>';

        return linha;
    }

    //adicionando a linha da table à table
    function carregarVendedores() {
        $.getJSON('/api/vendedores', function (vendedores) {
            for(var i=0;i<vendedores.length;i++){
                var linha = montarLinha(vendedores[i]);
                $('#tabelVendedores').append(linha);
            }
        });
    }

    //excluindo vendedor
    function apagar(id) {
        $.ajax({
            type:'DELETE',
            url:'/api/vendedores/' + id,
            context:this,
            success: function () {
                console.log('Success');
                linhas = $('#tabelVendedores>tbody>tr');
                e = linhas.filter(function (i, elemento) {
                    return  elemento.cells[0].textContent == id;
                });
                if (e) //== null
                    e.remove();
            },
            error:function (error) {
                console.log(error);
            }
        });
    }

    function editar(id) {
        $.getJSON('api/vendedores/'+id, function (data) {
            console.log(data);
            $('#id').val(data.id);
            $('#nome').val(data.nome);
            $('#cpf').val(data.cpf);
            $('#email').val(data.email);
            $('#categoria').val(data.categoria_id);
            $('#dlgVendedores').modal('show');
        });
    }


    //limpando campos e abrindo formulário modal
    function novoVendedor() {
        $('#id').val('');
        $('#nome').val('');
        $('#cpf').val('');
        $('#email').val('');
        $('#dlgVendedores').modal('show');
    }

    //carregando categorias ao input option do formulário
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

    //criando vendedor obtendo valores informados nos inputs do formulário
    function criarVendedor() {
        vendedor = {
            nome: $('#nome').val(),
            cpf: $('#cpf').val(),
            email: $('#email').val(),
            categoria_id: $('#categoria').val()
        };

        //incluindo cadastro novo na tabela no momento de submissão do formulário
        $.post('/api/vendedores', vendedor, function (data) {
            vendedor = JSON.parse(data); //transforma o dado em um objeto
            var linha = montarLinha(vendedor);
            $('#tabelVendedores').append(linha);
        });
    }

    function atualizarVendedor(){
        vend = {
            id: $('#id').val(),
            nome: $('#nome').val(),
            cpf: $('#cpf').val(),
            email: $('#email').val(),
            categoria_id: $('#categoria').val()
        }

        $.ajax({
            type:"PUT",
            url:'/api/vendedores/'+vend.id,
            context:this,
            data: vend,
             success: function (data) {
                vend = JSON.parse(data);
                linhas = $('#tabelVendedores>tbody>tr');
                e = linhas.filter(function(i, e){
                     return (e.cells[0].textContent == vend.id);
                 });

                if (e)  { //nao for nulo
                     e[0].cells[0].textContent = vend.id;
                     e[0].cells[1].textContent = vend.nome;
                     e[0].cells[2].textContent = vend.cpf;
                     e[0].cells[3].textContent = vend.email;
                     e[0].cells[4].textContent = vend.categoria_id;
                }
            },
            error:function (error) {
                console.log(error);
            }
        });

    }
    $('#formVendedor').submit(function (event) {
        //prevenindo o reload da página ao submete-la e escondendo o modal
        event.preventDefault();

        if($("#id").val() == ''){
            criarVendedor();
        } else {
            atualizarVendedor();
        }

        $('#dlgVendedores').modal('hide');
    });
</script>

@endsection
