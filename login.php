<?php
require('class_login.php');

if ($_POST != []) {
	$usuario = new login();
	$resultado = $usuario->checar_credenciais();
  if ($resultado) echo 'success';
  else echo 'error';
	$_POST = [];
}

?>