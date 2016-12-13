<?php
class BDMySQL {
	var $conn;
	function ligarBD($nomebd, $user, $pass, $server) {
		try {
			$this->conn = new PDO("mysql:host=$server;dbname=$nomebd", $user, $pass,array(PDO::MYSQL_ATTR_INIT_COMMAND => "SET NAMES 'utf8'"));
			//$this->conn = new PDO("mysql:host=$server;dbname=$nomebd", $user, $pass);
			//$this->conn->exec("SET NAMES 'utf8';");
			$this->conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
		}
		catch(PDOException $e)
		{
			echo "<br>" . $e->getMessage();
		}
	}
	
	function executarSQL($sql_command) {

		$resultado=$this->conn->query($sql_command);
		return $resultado;
	}

	function executarSQL_T($sql_command) {
		try {
			$this->conn->beginTransaction();
			$this->conn->exec($sql_command);
			$this->conn->commit();
			return true;
		}
		catch(PDOException $e)
		{
			// roll back the transaction if something failed
			$this->conn->rollback();
			echo "Error: " . $e->getMessage();
		}
	}

	function executarSQLWithID($sql_command) {
		$resultado=$this->conn->query($sql_command);
		if($resultado)
			echo $this->conn->lastInsertId();
		else
			return false;
	}

	function executarSQL_T_WithID($sql_command) {
		try {
			$this->conn->beginTransaction();
			$this->conn->exec($sql_command);
			$this->conn->commit();
			echo $this->conn->lastInsertId();
		}
		catch(PDOException $e)
		{
			// roll back the transaction if something failed
			$this->conn->rollback();
			echo "Error: " . $e->getMessage();
		}
	}

	
	function fecharBD() {
		//mysql_close ( $this->conn );
        $this->conn=null;
	}
}

?>