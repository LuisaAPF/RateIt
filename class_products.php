<?php
class produtos {
	
	function inserir_produto() {
		require('connection_data.php');
		
		$sql = $connection->prepare ("insert into PRODUTOS (categoria, descricao, preco, local, data, nota, observacoes, usuario) values (?, ?, ?, ?, ?, ?, ?, ?);");
		$sql->bind_param("ssssssss", $_POST['categoria'], $_POST['descricao'], $_POST['preco'], $_POST['local_compra'], $_POST['data_compra'], $_POST['nota'], $_POST['observacoes'], $_SESSION['login']);
		$sql_exec = $sql->execute();
		$sql->close();
		$connection->close();

		return $sql_exec;
	}

	function listar_produtos($produto) {
		require('connection_data.php');

		$palavra_chave = '%' .  $produto . '%';
		$retorno = [];
		
		$sql = $connection->prepare("select categoria, descricao, nota, observacoes from PRODUTOS where categoria like ? or descricao like ?;");
		$sql->bind_param("ss", $palavra_chave, $palavra_chave);
		$sql->execute();
		$sql->bind_result($categoria, $descricao, $nota, $observacoes);

		while ($row = $sql->fetch()){
			array_push($retorno, [$categoria, $descricao, $nota, $observacoes]);
		}

		$sql->close();
		$connection->close();

		return $retorno;						
	}

	function listar_meus_produtos($login) {
		require('connection_data.php');

		$retorno = [];
		$sql = "select id, categoria, descricao, nota, observacoes from PRODUTOS where usuario = '$login';";
		$resultado = $connection->query($sql);

		while ($row = $resultado->fetch_array(MYSQLI_ASSOC)) {
			array_push($retorno, $row);
		}

		$connection->close();

		return $retorno;						
	}

	function remover_produto($id) {
		require('connection_data.php');

		$sql = $connection->prepare("delete from PRODUTOS where id = ?;");
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