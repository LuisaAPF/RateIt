<?php
class produtos {
	
	function inserir_produto() {
		require('connection_data.php');
		
		$sql = $connection->prepare ("insert into products (type, brand, rate, comments, user) values (?, ?, ?, ?, ?);");
		$sql->bind_param("sssss", $_POST['type'], $_POST['brand'], $_POST['rate'], $_POST['comments'], $_SESSION['login']);
		$sql_exec = $sql->execute();
		$sql->close();
		$connection->close();

		return $sql_exec;
	}

	function listar_produtos($produto) {
		require('connection_data.php');

		$palavra_chave = '%' .  $produto . '%';
		$retorno = [];
		
		$sql = $connection->prepare("select type, brand, rate, comments from products where type like ? or brand like ?;");
		$sql->bind_param("ss", $palavra_chave, $palavra_chave);
		$sql->execute();
		$sql->bind_result($type, $brand, $rate, $comments);

		while ($row = $sql->fetch()){
			array_push($retorno, [$type, $brand, $rate, $comments]);
		}

		$sql->close();
		$connection->close();

		return $retorno;						
	}

	function listar_meus_produtos($login) {
		require('connection_data.php');

		$retorno = [];
		$sql = "select id, type, brand, rate, comments from products where user = '$login';";
		$resultado = $connection->query($sql);

		while ($row = $resultado->fetch_array(MYSQLI_ASSOC)) {
			array_push($retorno, $row);
		}

		$connection->close();

		return $retorno;						
	}

	function remover_produto($id) {
		require('connection_data.php');

		$sql = $connection->prepare("delete from products where id = ?;");
		$sql->bind_param('s', $id);
		$sql->execute();

		if ($sql->affected_rows == 0) {	
			$sql->close();		
		  $connection->close();
			return false;
		}

		$sql->close();
		$connection->close();
		return true;
		
	}


}