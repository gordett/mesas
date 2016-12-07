<?php
include_once "cabecalho.php";
include_once "bd/BdMySQL.class.php";
include_once "bd/Convidados.class.php";
$rsConvidados = new Convidados();
?>

<div class="container-fluid">
    <div class="row">
        <div class="col-lg-2">
            <div class="card">
                <div class="card-block">
                    <h6 class="card-title text-md-center">Convidados</h6>
                    <ul>
                        <?php
                        $array = $rsConvidados->listaConvidados();
                        foreach ($array as $value){
                            echo "<li class='btn btn-primary btn-sm convidado' id='{$value['id']}' style='width: 100%'>{$value['nome']}</li><br>";
                        }
                        ?>
                    </ul>
                </div>
            </div>
        </div>
        <div class="col-lg-10">
            <div id="sala"></div>
        </div>
    </div>

    <div class="row">
        <div class="col-md-12 text-md-center">

                <button id="addCircle" class="btn btn-primary btn-sm">Adiccionar mesa redonda</button>
                <button id="addTable" class="btn btn-primary btn-sm">Adiccionar mesa Rectangular</button>

        </div>
    </div>
    <br><br>
</div>



<?php
include_once "modal.php";
include_once "rodape.php";
?>