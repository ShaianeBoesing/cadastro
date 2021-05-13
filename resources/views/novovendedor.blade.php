<div class="modal" tabindex="-1" role="dialog" id="dlgVendedores">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <form class="form-horizontal" id="formVendedor">
                <div class="modal-header">
                    <h5>Novo vendedor</h5>
                </div>
                <div class="modal-body">
                    <input type="hidden" id="id">

                    <div class="form-group">
                        <label for="nome">Nome do vendedor</label>
                        <div class="input-group">
                            <input type="text" id="nome" class="form-control" placeholder="nome do vendedor">
                        </div>
                    </div>

                    <div class="form-group">
                        <label for="cpf">CPF</label>
                        <div class="input-group">
                            <input type="text" id="cpf" class="form-control" placeholder="cpf do vendedor">
                        </div>
                    </div>

                    <div class="form-group">
                        <label for="email">Email do vendedor</label>
                        <div class="input-group">
                            <input type="text" id="email" class="form-control" placeholder="email do vendedor">
                        </div>
                    </div>

                    <div class="form-group">
                        <label for="categoria">Categoria do vendedor</label>
                        <div class="input-group">
                            <select name="categoria" id="categoria" class="form-control"></select>
                        </div>
                    </div>
                </div>

                <div class="modal-footer">
                    <button type="submit" class="btn btn-primary">Salvar</button>
                    <button type="cancel" class="btn btn-secondary" data-dissmiss="modal">Cancel</button>
                </div>
            </form>
        </div>
    </div>
</div>
