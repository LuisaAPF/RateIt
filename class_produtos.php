<?php
class produtos {
	
	function inserir_produto() {
		require('connection_data.php');
		
		$sql = $connection->prepare ("insert into PRODUTOS (categoria, descricao, preco, local, data, nota, observacoes, usuario) values (?, ?, ?, ?, ?, ?, ?, ?);");
		$sql->bind_param("ssssssss", $_POST['categoria'], $_POST['descricao'], $_POST['preco'], $_POST['local_compra'], $_POST['data_compra'], $_POST['nota'], $_POST['observacoes'], $_POST['usuario']);
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


}