<div id="createClient" class="modal fade" tabindex="-1" role="dialog">
    <div class="modal-dialog">
        <div class="modal-content">
            <form action="{{route('clients.store')}}" method="post">
                {{csrf_field()}}
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal">&times;</button>
                    <h4 class="modal-title">Criando cliente</h4>
                </div>
                <div class="modal-body">
                    <div class="form-group">
                        <label for="name">Nome do Cliente</label>
                        <input type="text" name="name" class="form-control" required>
                    </div>

                    <div class="form-group">
                        <label for="name">Email do Cliente</label>
                        <input type="text" name="email" class="form-control" required>
                    </div>

                    <div class="form-group">
                        <label for="name">Documento (CPF ou CNPJ)</label>
                        <input type="text" name="document" class="form-control" required>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-default" data-dismiss="modal">Fechar</button>
                    <button type="submit" class="btn btn-primary">Salvar mudanças</button>
                </div>
            </form>
        </div>
    </div>
</div>
