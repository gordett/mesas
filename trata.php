<?php

include_once "bd/BdMySQL.class.php";
include_once "bd/Convidados.class.php";
$rsConvidados = new Convidados();

switch ($_POST['accao']){
    case 'inserirMesa';
        extract($_POST);
        $result = $rsConvidados->inserirMesa($id, $nome, $lugares);
        return $result;
    break;

    case 'editarMesa';
        extract($_POST);
        $result = $rsConvidados->editarMesa($id, $lugares);
        return $result;
    break;

    case 'editarPosicaoMesa';

        extract($_POST);
        $result = $rsConvidados->editarPosicaoMesa($id, $x, $y);
        return $result;
    break;
}
?>