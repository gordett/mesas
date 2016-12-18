<?php

include_once "bd/BdMySQL.class.php";
include_once "bd/Convidados.class.php";
$rsConvidados = new Convidados();

switch ($_POST['accao']){
    case 'inserirMesa';
        extract($_POST);
        echo $result = $rsConvidados->inserirMesa($nome, $lugares);
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

    case 'colocarConvidado';
        extract($_POST);
        $result = $rsConvidados->colocarConvidado($id_convidado, $nome_convidado, $id_mesa, $nome_mesa, $lugares);
        return $result;
        break;

}
?>