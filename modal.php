<!-- Modal -->
<div id="myModal" class="modal fade" role="dialog">
    <div class="modal-dialog">

        <!-- Modal content-->
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal">&times;</button>
                <h4 class="modal-title">Escolha o nº de lugares da mesa</h4>
            </div>
            <div class="modal-body">
                <select id="lugares" onchange="alterarMesa(this.value, mesa)">
                    <option value="" selected>Nº de lugares</option>
                    <option value="6">6</option>
                    <option value="8">8</option>
                    <option value="10">10</option>
                    <option value="12">12</option>
                </select>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-default fechar" data-dismiss="modal">Close</button>
            </div>
        </div>

    </div>
</div>