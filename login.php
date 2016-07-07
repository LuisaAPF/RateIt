<?php
require('class_login.php');

if ($_POST != []) {
	$usuario = new login();
	$resultado = $usuario->checar_credenciais();
  echo $resultado;
	$_POST = [];
}

?>