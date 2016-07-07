<?php
// ini_set('display_errors', 1);
// ini_set('display_startup_errors', 1);
// error_reporting(E_ALL);
require('header.html');
require('class_login.php');

if (isset($_POST) and $_POST != []) {
	$usuario = new login();
	$resultado = $usuario->cadastrar_login_senha();
	if ($resultado) {
		echo '<div class="container"><div class="alert-success">Cadastro concluído com sucesso!</div></div>';	
	}
	else {
		echo '<div class="container"><div class="alert-error">Ocorreu um erro e a ação não foi concluída.</div></div>';
	}
	unset($_POST);
	$_POST = [];
}
?>

<form method="POST" action="">
	<div class="container">
		<br>
		<div class="row">
			<div>
				<input id="login-cadastro" name="login" placeholder=" Login" class="input-lg" required>
			</div>
		</div>
		<div class="row">
				<input id="senha-cadastro" name="senha" type="password" placeholder=" Senha" class="input-lg" required>
		</div>
		<div class="row">
			<button id="btn-submit-cadastro" type="submit" class="btn-lg right">Cadastrar</button>
		</div>
	</div>
</form>

<?php			
require('footer.html');
?>