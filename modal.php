<!-- Modal -->
<div id="myModal" class="modal fade" role="dialog">
    <div class="modal-dialog">

        <!-- Modal content-->
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal"><i class="fa fa-times-circle" aria-hidden="true"></i> </button>
                <h4 class="modal-title">Escolha o nº de lugares da mesa</h4>
            </div>
            <div class="modal-body">
                <input type="text" id="lugares">
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-default fechar" onclick="alterarMesa($('#lugares').val())" data-dismiss="modal">Alterar</button>
                <button type="button" class="btn btn-default fechar" data-dismiss="modal">Close</button>
            </div>
        </div>
    </div>
</div>