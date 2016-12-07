<?php
require 'config.inc.php';

class Convidados extends BDMySQL
{
    var $bd;

    function Convidados()
    {
        global $NOME_BD, $USER_BD, $PASS_BD, $SERVER_NAME;
        $this->bd = new BDMySQL ();
        $this->bd->ligarBD($NOME_BD, $USER_BD, $PASS_BD, $SERVER_NAME);
    }



    function listaConvidados()
    {
        $sql = "SELECT * FROM convidados";
        $resultado = $this->bd->executarSQL($sql);
        $data = array();
        $retorno = array();
        while ($row = $resultado->fetch(PDO::FETCH_ASSOC)) {
            $data['id'] = $row['id'];
            $data['nome'] = $row['nome'];
            array_push($retorno,$data);
        }
        return $retorno;
    }


    function inserirMesa($id, $nome, $lugares)
    {
        $sql = "insert into mesas (id, nome, lugares) values ('$id','$nome','$lugares')";
        if ($this->bd->executarSQL($sql))
            return true;
        else
            return false;
    }

    function editarMesa($id, $lugares)
    {
        $sql = "update mesas set lugares='$lugares' where id='$id'";
        if ($this->bd->executarSQL($sql))
            return true;
        else
            return false;
    }

    function editarPosicaoMesa($id, $x, $y)
    {
        $sql = "update mesas set x='$x', y='$y' where id='$id'";
        if ($this->bd->executarSQL($sql))
            return true;
        else
            return false;
    }

    /*
        function verificarExisteEmail($email)
        {
            $email = trim($email);
            $sql = "select * from utilizador where email = '$email'";
            if (($this->bd->executarSQL($sql))) {
                $rs = $this->bd->executarSQL($sql);
                if ($rs->fetch(PDO::FETCH_ASSOC) == false) {
                    return false;
                } else {
                    return true;
                }
            } else {
                return false;
            }
        }

        function alterarUtilizador($id, $email, $contato, $nome, $precoKm, $precoVisita)
        {
            $sql = "update utilizador set precoKm='$precoKm', precoVisita='$precoVisita', email='$email', telefone='$contato', nome='$nome' where id='$id'";
            if ($this->bd->executarSQL($sql))
                return true;
            else
                return false;
        }

        function alterarPassUtilizador($id, $pass)
        {
            $sql = "update utilizador set truque='$pass' where id='$id'";
            if ($this->bd->executarSQL($sql))
                return true;
            else
                return false;
        }

        function eliminarUtilizador($id)
        {
            $sql = "delete from utilizador where id='$id'";
            if ($this->bd->executarSQL($sql))
                return true;
            else
                return false;
        }

        function verificarExisteUtilizador($email, $password)
        {
            $email = trim($email);
            $password = trim($password);
            $sql = "select * from utilizador where email = '$email' and truque = '$password'";
            if (($this->bd->executarSQL($sql))) {
                $rs = $this->bd->executarSQL($sql);
                if ($rs->fetch(PDO::FETCH_ASSOC) == false) {
                    return false;
                } else {
                    return true;
                }
            } else {
                return false;
            }
        }

        function verificarUtilizadorAtivo($email)
        {
            $sql = "select activo from utilizador where email = '$email'";
            $resultado = $this->bd->executarSQL($sql);
            $result = $resultado->fetch();
            return $result[0];
            $this->endUtilizador();
        }

        function verificarNomePorEmail($email)
        {
            $sql = "select nome from utilizador where email = '$email'";
            $resultado = $this->bd->executarSQL($sql);
            $result = $resultado->fetch();
            return $result[0];
            $this->endUtilizador();
        }

        function verificarNomePorId($id)
        {
            $sql = "select nome from utilizador where id = '$id'";
            $resultado = $this->bd->executarSQL($sql);
            $result = $resultado->fetch();
            return $result[0];
            $this->endUtilizador();
        }

        function verificarEmailPorId($id)
        {
            $sql = "select email from utilizador where id = '$id'";
            $resultado = $this->bd->executarSQL($sql);
            $result = $resultado->fetch();
            return $result[0];
            $this->endUtilizador();
        }

        function verificarIdPorEmail($email)
        {
            $sql = "select id from utilizador where email = '$email'";
            $resultado = $this->bd->executarSQL($sql);
            $result = $resultado->fetch();
            return $result[0];
            $this->endUtilizador();
        }

        function saberPrecoKmDomicare($id)
        {
            $sql = "select precoKm from utilizador where id = '$id'";
            $resultado = $this->bd->executarSQL($sql);
            $result = $resultado->fetch();
            return $result[0];
            $this->endUtilizador();
        }

        function saberPrecoVisitaDomicare($id)
        {
            $sql = "select precoVisita from utilizador where id = '$id'";
            $resultado = $this->bd->executarSQL($sql);
            $result = $resultado->fetch();
            return $result[0];
            $this->endUtilizador();
        }

        function guardarVisita($email)
        {
            $sql = "update utilizador set data_visita=now(), contador_visitas=contador_visitas+1 where email='$email'";
            if ($this->bd->executarSQL($sql))
                return true;
            else
                return false;
        }





        function verificarNivel($email)
        {
            $email = trim($email);
            $sql = "select nivel from utilizador where email = '$email'";
            $resultado = $this->bd->executarSQL($sql);
            $result = $resultado->fetch();
            return $result['nivel'];
        }

        function verificarHospitalId($email)
        {
            $email = trim($email);
            $sql = "select hospital from utilizador where email = '$email'";
            $resultado = $this->bd->executarSQL($sql);
            $result = $resultado->fetch();
            return $result['hospital'];
        }

        function verificarNivelUtilizador($nivel)
        {
            if ($nivel == 0) {
                $resultado = "Super Administrador";
            }
            elseif ($nivel == 1) {
                $resultado = "Administrador";
            } elseif ($nivel == 2) {
                $resultado = "Enf. Domicare";
            }elseif ($nivel == 3) {
                $resultado = "Prof. de Saúde";
            }
            return $resultado;
        }*/

    function endProduto()
    {
        $this->bd->fecharBD();
    }
}

?>